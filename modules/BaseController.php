<?php
namespace Speakout\Modules;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use JWTAuth;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\ArraySerializer;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller {
    use Helpers,DispatchesJobs,ValidatesRequests,AuthorizesRequests;
	
	protected function success($data)
    {


        return response()->json([
            'status'     => "success",
            'data'        => $data,
        ]);
    }

    protected function successWithPages($paginator, $transformer)
    {
        
		$collection = $paginator->getCollection();

		$data = fractal()
			->collection($collection)
			->transformWith($transformer)
            ->serializeWith(new ArraySerializer())         
            ->withResourceName('items')
			->paginateWith(new IlluminatePaginatorAdapter($paginator))
			->toArray();
        return response()->json([
            'status'     => "success",
            'data'        => $data
        ]);
    }

	protected function fail($message,$status=500)
    {
        return response()->json([
            'status'     => "fail",
            'message'        => $message,
        ],$status);
    }

	protected function transform($model, $transformer)
	{		
		$data = fractal($model, $transformer)->serializeWith(new \Spatie\Fractalistic\ArraySerializer());
		return $this->success($data);		
	}

	protected function error($message,$code=400)
    {
        return response()->json([
            'error'     => "fail",
            'message'    => $message,
        ],$code);
    }
}