<?php

namespace Speakout\Modules\Complaint\Api\v1\Controllers;

use Speakout\Modules\BaseController;
use Speakout\Modules\Complaint\Api\v1\Repositories\ComplaintRepository;
use Speakout\Modules\Complaint\Api\v1\Requests\CreateComplaintRequest;
use Speakout\Modules\Complaint\Api\v1\Transformers\ComplaintTransformer;
use Speakout\Modules\Complaint\Api\v1\Transformers\UserComplaintTransformer;


class ComplaintController extends BaseController
{

    /**
     * @var ComplaintRepository
     */
    private $complaint;

    /**
     * @var ComplaintTransformer
     */
    private $complaintTransformer;

    private $userComplaintTransformer;

    /**
     * ComplaintController constructor.
     * @param ComplaintRepository $complaint
     * @param ComplaintTransformer $complaintTransformer
     * @param UserComplaintTransformer $userComplaintTransformer
     */
    public function __construct(ComplaintRepository $complaint,
                                ComplaintTransformer $complaintTransformer,
                                UserComplaintTransformer $userComplaintTransformer)
    {
        $this->complaint = $complaint;
        $this->complaintTransformer = $complaintTransformer;
        $this->userComplaintTransformer = $userComplaintTransformer;

    }

    public function getComplaintByUser()
    {
        $user = $this->complaint->getComplaintByUser();
        return $this->transform($user, $this->userComplaintTransformer);
    }

    /**
     * Handle request for agencies
     *
     * @param CreateComplaintRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function agencies(CreateComplaintRequest $request)
    {
        $agency = $this->complaint->agencies($request->all());
        if ($agency)
            return $this->transform($agency, $this->complaintTransformer);
    }


    /**
     * Handle request for legislature
     *
     * @param CreateComplaintRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function legislature(CreateComplaintRequest $request)
    {
        $legislature = $this->complaint->legislature($request->all());
        if ($legislature)
            return $this->transform($legislature, $this->complaintTransformer);
    }


    /**
     * Handle request for executive
     *
     * @param CreateComplaintRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function executiv(CreateComplaintRequest $request)
    {
        $executive = $this->complaint->executiv($request->all());
        if ($executive)
            return $this->transform($executive, $this->complaintTransformer);
    }

    /**
     * Handle request for judiciary
     *
     * @param CreateComplaintRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function judiciary(CreateComplaintRequest $request)
    {
        $judiciary = $this->complaint->judiciary($request->all());
        if ($judiciary)
            return $this->transform($judiciary, $this->complaintTransformer);
    }

    /**
     * Handle Request for local government
     *
     * @param CreateComplaintRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function state(CreateComplaintRequest $request)
    {
        $state = $this->complaint->state($request->all());
        if ($state)
            return $this->transform($state, $this->complaintTransformer);
    }


    /**
     * Handle request for local government
     *
     * @param CreateComplaintRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function localGov(CreateComplaintRequest $request)
    {
        $localGov = $this->complaint->localGov($request->all());
        if ($localGov)
            return $this->transform($localGov, $this->complaintTransformer);
    }


}