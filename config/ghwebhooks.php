<?php

return [

     /*
     |--------------------------------------------------------------------------
     | Webhook Secret
     |--------------------------------------------------------------------------
     | The WebHook secret used to authenticate GitHub Webhooks.
     |
     */
     'secret' => env('GH_SECRET', false),

     /*
     |--------------------------------------------------------------------------
     | Secret error
     |--------------------------------------------------------------------------
     | The error to throw when the secret doesn't match.
     |
     */
     'secreterror' => "This action didn't come from GitHub or webhooks aren't properly configured.",

     /*
     |--------------------------------------------------------------------------
     | Event Class
     |--------------------------------------------------------------------------
     | The class for your GitHub Events.
     |
     */
     'eventclass' => 'App\Events\GitHub\GitHub%sEvent',

     /*
     |--------------------------------------------------------------------------
     | Webhook Secret
     |--------------------------------------------------------------------------
     | The error to throw when the event is not found.
     |
     */
     'eventerror' => 'Event not supported.',

     /*
     |--------------------------------------------------------------------------
     | Model
     |--------------------------------------------------------------------------
     | The model to check repositories against.
     |
     */
     'model' => \App\Repository::class,

     /*
     |--------------------------------------------------------------------------
     | Model Error
     |--------------------------------------------------------------------------
     | The error to throw when the model is not found.
     |
     */
     'modelerror' => "This repository doesn't exist in this application.",

     /*
     |--------------------------------------------------------------------------
     | Success Response
     |--------------------------------------------------------------------------
     | The response to return when everything works.
     |
     */
     'response' => ['message' => 'Event successfully received.'],
];
