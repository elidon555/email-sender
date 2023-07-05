<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mails\SendUserPostsMailRequest;
use App\Http\Services\Mail\MailService;
use Illuminate\Http\JsonResponse;

class MailController extends Controller
{

    private MailService $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * @OA\Post(
     *     path="/api/mail/send/user-posts",
     *     summary="Send user posts mail",
     *     tags={"Mails"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"emails"},
     *              @OA\Property(property="emails", type="array", @OA\Items(type="string")),
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Your email is being processed",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Your email is being processed"),
     *          )
     *     ),
     *     @OA\Response(
     *          response=500,
     *          description="Email could not be sent",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Email could not be sent"),
     *          )
     *     )
     * )
     * @param SendUserPostsMailRequest $request
     * @return JsonResponse
     */
    public function sendUserPostsMail(SendUserPostsMailRequest $request): JsonResponse
    {
        $params = $request->validated();

        try {
            $this->mailService->sendUserPostsMail($params['emails']);
            return response()->json(['message' => 'Your email is being processed'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Email could not be sent'], 500);
        }
    }
}