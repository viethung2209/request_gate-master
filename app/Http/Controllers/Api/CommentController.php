<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Contracts\Services\Api\CommentServiceInterface;
use App\Http\Requests\Api\Comments\CommentRequest;
use App\Http\Requests\Api\Comments\IndexRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends ApiController
{
    /**
     * CommentController constructor.
     * @param CommentServiceInterface $commentService
     */
    public function __construct(CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;
        parent::__construct();
    }

    /**
     * @param $id
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index($id, IndexRequest $request)
    {
        $params = $request->all();
        return $this->getData(function () use ($params, $id) {
            $result = $this->commentService->index($params, $id);
            return [
                'total_record' => $result->total(),
                'data' => $result
            ];
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CommentRequest $request, $id)
    {
        $params = $request->all();
        $params['request_id'] = $id;
        return $this->doRequest(function () use ($params) {
            return [
                'data' => $this->commentService->store($params)
            ];
        });
    }
}
