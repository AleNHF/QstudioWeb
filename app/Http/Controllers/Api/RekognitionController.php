<?php

namespace App\Http\Controllers\Api;

use App\Events\ContentNotificationEvent;
use App\Models\Children;
use App\Models\Content;
use App\Models\File;
use App\Models\User;
use App\Notifications\ActivateNotification;
use Aws\Rekognition\RekognitionClient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Storage;

class RekognitionController extends BaseController
{
    /**
     * TODO: Function for the recognition of inappropriate images in CAMERA
     */
    public function imageControlCamera(Request $request)
    {
        if ($request->hasFile('photo')) {
            $client = new RekognitionClient([
                'region' => 'us-east-1',
                'version' => 'latest'
            ]);

            // Getting the image
            $image = fopen($request->file('photo')->getPathName(), 'r');
            $bytes = fread($image, $request->file('photo')->getSize());

            // Consulting the AWS service
            $result = $client->detectModerationLabels([
                'Image' => ['Bytes' => $bytes],
                'MinConfidence' => 51 
            ]);

            $resultLabels = $result->get('ModerationLabels');

            if ($resultLabels !== []) {
                try {
                    $name = $request->file('photo')->getClientOriginalName();
                    // Save the foto
                    $folder = "children";

                    // Consult if exist in database
                    $imageCamera = 'DCIM/Camera/' . $name;
                    $existImage = Content::where(['path' => $imageCamera])->first();

                    if (!$existImage) {
                        // Receive image information and send as notification
                        $child = Children::find($request->children_id);
                        $user = User::find($child->tutor->user->id);

                        $savePhoto = new Content();
                        $imagePath = Storage::disk('s3')->put($folder, $request->photo, 'public');
                        $savePhoto->date = Carbon::now()->setTimezone('America/La_Paz');
                        $savePhoto->path = 'DCIM/Camera/' . $name;

                        if ($resultLabels[1]['ParentName'] == "Explicit Nudity" || $resultLabels[1]["ParentName"] == "Suggestive") {
                            $parentName = $resultLabels[1]["ParentName"];
                            $name = $resultLabels[1]["Name"];
                        } else {
                            $parentName = $resultLabels[0]["ParentName"];
                            $name = $resultLabels[0]["Name"];
                        }

                        $savePhoto->url = $imagePath;
                        $savePhoto->type = $parentName;
                        $savePhoto->contentData = $name;
                        $savePhoto->children_id = $request->children_id;
                        $savePhoto->save();

                        event(new ContentNotificationEvent($user, $savePhoto));
                        event(new ActivateNotification());                
                    }
                } catch (\Exception $e) {
                    dd($e);
                }

                return $this->sendResponse($name, "Content was saved");
            }
        } 

        return $this->sendError("Not Found.", 404);
    }

    /**
     * TODO: Function for the recognition of inappropriate images in DOWNLOADS
     */
    public function imageControlDownload(Request $request)
    {    
        if ($request->hasFile('photo')) {
            $client = new RekognitionClient([
                'region' => 'us-east-1',
                'version' => 'latest'
            ]);

            // Getting the image
            $image = fopen($request->file('photo')->getPathName(), 'r');
            $bytes = fread($image, $request->file('photo')->getSize());

            // Consulting the AWS service
            $result = $client->detectModerationLabels([
                'Image' => ['Bytes' => $bytes],
                'MinConfidence' => 51 
            ]);

            $resultLabels = $result->get('ModerationLabels');

            if ($resultLabels !== []) {
                try {
                    $name = $request->file('photo')->getClientOriginalName();
                    // Save the foto
                    $folder = "children";

                    // Consult if exist in database
                    $imageCamera = 'Storage/Descarga/' . $name;
                    $existImage = Content::where(['path' => $imageCamera])->first();

                    if (!$existImage) {
                        // Receive image information and send as notification
                        $child = Children::find($request->children_id);
                        $user = User::find($child->tutor->user->id);

                        $savePhoto = new Content();
                        $imagePath = Storage::disk('s3')->put($folder, $request->photo, 'public');
                        $savePhoto->date = Carbon::now()->setTimezone('America/La_Paz');
                        $savePhoto->path = 'Storage/Descarga/' . $name;

                        if ($resultLabels[1]['ParentName'] == "Explicit Nudity" || $resultLabels[1]["ParentName"] == "Suggestive") {
                            $parentName = $resultLabels[1]["ParentName"];
                            $name = $resultLabels[1]["Name"];
                        } else {
                            $parentName = $resultLabels[0]["ParentName"];
                            $name = $resultLabels[0]["Name"];
                        }

                        $savePhoto->url = $imagePath;
                        $savePhoto->type = $parentName;
                        $savePhoto->contentData = $name;
                        $savePhoto->children_id = $request->children_id;
                        $savePhoto->save();

                        event(new ContentNotificationEvent($user, $savePhoto));
                        event(new ActivateNotification());
                    }

                } catch (\Exception $e) {
                    dd($e);
                }

                return $this->sendResponse($name, "Content was saved");
            }
        } 

        return $this->sendError("Not Found.", 404);
    }

    /**
     * TODO: Function for the recognition of inappropriate images in FACEBOOK
     */
    public function imageControlFacebook(Request $request)
    {   
        if ($request->hasFile('photo')) {
            $client = new RekognitionClient([
                'region' => 'us-east-1',
                'version' => 'latest'
            ]);

            // Getting the image
            $image = fopen($request->file('photo')->getPathName(), 'r');
            $bytes = fread($image, $request->file('photo')->getSize());

            // Consulting the AWS service
            $result = $client->detectModerationLabels([
                'Image' => ['Bytes' => $bytes],
                'MinConfidence' => 51 
            ]);

            $resultLabels = $result->get('ModerationLabels');

            if ($resultLabels !== []) {
                try {
                    $name = $request->file('photo')->getClientOriginalName();
                    // Save the foto
                    $folder = "children";

                    // Consult if exist in database
                    $imageCamera = 'Storage/DCIM/Facebook/' . $name;
                    $existImage = Content::where(['path' => $imageCamera])->first();

                    if (!$existImage) {
                        // Receive image information and send as notification
                        $child = Children::find($request->children_id);
                        $user = User::find($child->tutor->user->id);

                        $savePhoto = new Content();
                        $imagePath = Storage::disk('s3')->put($folder, $request->photo, 'public');
                        $savePhoto->date = Carbon::now()->setTimezone('America/La_Paz');
                        $savePhoto->path = 'Storage/DCIM/Facebook/' . $name;

                        if ($resultLabels[1]['ParentName'] == "Explicit Nudity" || $resultLabels[1]["ParentName"] == "Suggestive") {
                            $parentName = $resultLabels[1]["ParentName"];
                            $name = $resultLabels[1]["Name"];
                        } else {
                            $parentName = $resultLabels[0]["ParentName"];
                            $name = $resultLabels[0]["Name"];
                        }

                        $savePhoto->url = $imagePath;
                        $savePhoto->type = $parentName;
                        $savePhoto->contentData = $name;
                        $savePhoto->children_id = $request->children_id;
                        $savePhoto->save();

                        event(new ContentNotificationEvent($user, $savePhoto));
                        event(new ActivateNotification());
                    }

                } catch (\Exception $e) {
                    dd($e);
                }

                return $this->sendResponse($name, "Content was saved");
            }
        } 

        return $this->sendError("Not Found.", 404);
    }

    /**
     * TODO: Function for the recognition of inappropriate images in TELEGRAM
     */
    public function imageControlTelegram(Request $request)
    {  
        if ($request->hasFile('photo')) {
            $client = new RekognitionClient([
                'region' => 'us-east-1',
                'version' => 'latest'
            ]);

            // Getting the image
            $image = fopen($request->file('photo')->getPathName(), 'r');
            $bytes = fread($image, $request->file('photo')->getSize());

            // Consulting the AWS service
            $result = $client->detectModerationLabels([
                'Image' => ['Bytes' => $bytes],
                'MinConfidence' => 51 
            ]);

            $resultLabels = $result->get('ModerationLabels');

            if ($resultLabels !== []) {
                try {
                    $name = $request->file('photo')->getClientOriginalName();
                    // Save the foto
                    $folder = "children";

                    // Consult if exist in database
                    $imageCamera = 'Storage/Pictures/Telegram/' . $name;
                    $existImage = Content::where(['path' => $imageCamera])->first();

                    if (!$existImage) {
                        // Receive image information and send as notification
                        $child = Children::find($request->children_id);
                        $user = User::find($child->tutor->user->id);

                        $savePhoto = new Content();
                        $imagePath = Storage::disk('s3')->put($folder, $request->photo, 'public');
                        $savePhoto->date = Carbon::now()->setTimezone('America/La_Paz');
                        $savePhoto->path = 'Storage/Pictures/Telegram/' . $name;

                        if ($resultLabels[1]['ParentName'] == "Explicit Nudity" || $resultLabels[1]["ParentName"] == "Suggestive") {
                            $parentName = $resultLabels[1]["ParentName"];
                            $name = $resultLabels[1]["Name"];
                        } else {
                            $parentName = $resultLabels[0]["ParentName"];
                            $name = $resultLabels[0]["Name"];
                        }

                        $savePhoto->url = $imagePath;
                        $savePhoto->type = $parentName;
                        $savePhoto->contentData = $name;
                        $savePhoto->children_id = $request->children_id;
                        $savePhoto->save();

                        event(new ContentNotificationEvent($user, $savePhoto));
                        event(new ActivateNotification());
                    }

                } catch (\Exception $e) {
                    dd($e);
                }

                return $this->sendResponse($name, "Content was saved");
            }
        } 

        return $this->sendError("Not Found.", 404);
    }

    /**
     * TODO: Function for the recognition of inappropriate images in CAPTURE
     */
    public function imageControlCapture(Request $request)
    {
        
        if ($request->hasFile('photo')) {
            $client = new RekognitionClient([
                'region' => 'us-east-1',
                'version' => 'latest'
            ]);

            // Getting the image
            $image = fopen($request->file('photo')->getPathName(), 'r');
            $bytes = fread($image, $request->file('photo')->getSize());

            // Consulting the AWS service
            $result = $client->detectModerationLabels([
                'Image' => ['Bytes' => $bytes],
                'MinConfidence' => 51 
            ]);

            $resultLabels = $result->get('ModerationLabels');

            if ($resultLabels !== []) {
                try {
                    $name = $request->file('photo')->getClientOriginalName();
                    // Save the foto
                    $folder = "children";

                    // Consult if exist in database
                    $imageCamera = 'Storage/DCIM/Screenshots/' . $name;
                    $existImage = Content::where(['path' => $imageCamera])->first();

                    if (!$existImage) {
                        // Receive image information and send as notification
                        $child = Children::find($request->children_id);
                        $user = User::find($child->tutor->user->id);

                        $savePhoto = new Content();
                        $imagePath = Storage::disk('s3')->put($folder, $request->photo, 'public');
                        $savePhoto->date = Carbon::now()->setTimezone('America/La_Paz');
                        $savePhoto->path = 'Storage/DCIM/Screenshots/' . $name;

                        if ($resultLabels[1]['ParentName'] == "Explicit Nudity" || $resultLabels[1]["ParentName"] == "Suggestive") {
                            $parentName = $resultLabels[1]["ParentName"];
                            $name = $resultLabels[1]["Name"];
                        } else {
                            $parentName = $resultLabels[0]["ParentName"];
                            $name = $resultLabels[0]["Name"];
                        }

                        $savePhoto->url = $imagePath;
                        $savePhoto->type = $parentName;
                        $savePhoto->contentData = $name;
                        $savePhoto->children_id = $request->children_id;
                        $savePhoto->save();

                        event(new ContentNotificationEvent($user, $savePhoto));
                        event(new ActivateNotification());
                    }

                } catch (\Exception $e) {
                    dd($e);
                }

                return $this->sendResponse($name, "Content was saved");
            }
        } 

        return $this->sendError("Not Found.", 404);
    }

    /**
     * TODO: Function for the recognition of inappropriate documents
     */
    public function documentControl(Request $request)
    {
        if ($request->hasFile('photo')) {
            try {
                $name = $request->file('photo')->getClientOriginalName();

                // CONSULTA SI EXISTE IMAGEN EN LA BADE DE DATOS
                $document = "Storage/Documents/" . $name;
                $existDocument = Content::where('path', $document)->first();

                if (!$existDocument) {
                    $storeDocument = new File();
                    $storeDocument->createDate = Carbon::now()->setTimezone('America/La_Paz');
                    $storeDocument->path = "Storage/Documents/" . $name;
                    $storeDocument->children_id = $request->children_id;
                    $storeDocument->save();
                }
            } catch (\Exception $e) {
                dd($e);
            }

            return $this->sendResponse($name, "File uploaded");
        }
    }
}