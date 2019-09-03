<?php

namespace Speakout\Modules\Complaint\Api\v1\Repositories;

use Speakout\Modules\Account\Models\Category;
use Speakout\Modules\BaseRepository;
use Speakout\Modules\Complaint\Models\Complaint;


class ComplaintRepository extends BaseRepository
{

    private $complaint;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     * @param SubCategory $subcategory
     */
    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;

    }

    public function getComplaintByUser()
    {
//        dd(auth()->user());
        $user = auth()->user();
        return $user;
    }


    /**
     * Return agencies
     *
     * @param $data
     * @return mixed
     */
    public function agencies($data)
    {
        $data = (object)$data;

        $cat = Category::where('id', '1')->orWhere('categoryName', 'Agencies')->first();
        $agency = $this->inputDetails($data);
        $agency->category = $cat->id;
        $agency->subcategory = $data->subcategory;
        $agency->save();
        return $agency;

    }


    /**
     * Return legislature
     *
     * @param $data
     * @return mixed
     */
    public function legislature($data)
    {
        $cat = Category::where('id', '2')->orWhere('categoryName', 'Legislature')->first();
        $legislature = $this->inputDetails($data);
        $legislature->category = $cat->id;
        $legislature->save();
        return $legislature;
    }

    /**
     * Return executive
     *
     * @param $data
     * @return mixed
     */
    public function executiv($data)
    {
        $data = (object)$data;

        $cat = Category::where('id', '3')->orWhere('categoryName', 'Executive')->first();
        $executive = $this->inputDetails($data);
        $executive->category = $cat->id;
        $executive->subcategory = $data->subcategory;
        $executive->save();
        return $executive;
    }


    /**
     * Return judiciary
     *
     * @param $data
     * @return mixed
     */
    public function judiciary($data)
    {
        $cat = Category::where('id', '4')->orWhere('categoryName', 'Judiciary')->first();
        $judiciary = $this->inputDetails($data);
        $judiciary->category = $cat->id;
        $judiciary->save();
        return $judiciary;
    }

    /**
     * Return state
     * @param array $data
     * @return mixed
     */
    public function state(array $data)
    {
        $data = (object)$data;

        $complaint =  $this->inputDetails($data);
        $complaint->state = $data->state;
        $complaint->save();
        return $complaint;
    }


    /**
     * Return local gov
     * @param array $data
     * @return mixed
     */
    public function localGov(array $data)
    {
        $data = (object)$data;

        $complaint =  $this->inputDetails($data);
        $complaint->local_gov = $data->local_gov;
        $complaint->save();
        return $complaint;
    }


    /**
     * Handle incoming data for complaint
     *
     * @param $data
     * @return mixed
     */
    private function inputDetails($data)
    {
        $data = (object)$data;

        $complaint  = new $this->complaint;
        $complaint->userId           = auth()->user()->id;
        $complaint->complaintType    = $data->complaintType;
        $complaint->noc              = $data->noc;
        $complaint->complaintDetails = $data->complaintDetails;
        $complaint->complaintFile    = $data->complaintFile;
        $complaint->regDate          = currentTime();
        $complaint->lastUpdationDate = currentTime();

        return $complaint;
    }



}