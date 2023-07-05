<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *   title="Email Sender Application",
 *   version="1.0",
 *   description="This is an API that sends email to users. The email contains users with their respective post titles",
 *   termsOfService="http://api_url/terms/",
 *   @OA\Contact(
 *     email="support@your-api.com",
 *     name="Support Team"
 *   ),
 *   @OA\License(
 *     name="API License",
 *     url="http://api_url/license"
 *   )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
