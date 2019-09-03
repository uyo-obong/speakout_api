<?php

namespace Speakout\Modules\Complaint\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Speakout\Modules\Complaint\Models\Complaint;

class ComplaintTransformer extends TransformerAbstract
{
    public function transform(Complaint $complaint)
    {

        return [
            'complaintNumber'     => $complaint->complaintNumber,
            'userId'              => $complaint->userId,
            'category'            => $complaint->category,
            'subcategory'         => $complaint->subcategory,
            'state'               => $complaint->state,
            'local_gov'           => $complaint->local_gov,
            'noc'                 => $complaint->noc,
            'complaintDetails'    => $complaint->complaintDetails,
            'complaintFile'       => $complaint->complaintFile,
//            'status'              => $complaint->status,
            'regDate'             => formatDate($complaint->regDate),
        ];
    }
}