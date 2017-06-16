<?php

namespace DependenCI\GHWebhooks;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GHWebhooks
{
    /**
     * Handle a webhook coming from GitHub.
     *
     * @return Response
     */
     public function handle()
     {
         if (config('ghwebhook.secret'))
         {
           abort_unless($this->githubSignatureIsValid(), 301, config('ghwebhooks.secreterror', "This action didn't come from GitHub or webhooks aren't properly configured.")); // TODO: Use throw_unless BadRequestHttpException in Laravel 5.5
         }

         $class = sprintf(config('ghwebhooks.eventclass'), ucfirst(camel_case(request()->header('X-GitHub-Event'))));

         if (! class_exists($class)) { // TODO: Use throw_unless BadRequestHttpException in Laravel 5.5
             throw new BadRequestHttpException(config('ghwebhooks.eventerror', 'Event not supported.'));
         }

         $data = request()->input();
         if (class_exists(config('ghwebhooks.model')))
         {
           $model = config('ghwebhooks.model')::find($data['repository']['id']);

           if (! $model) { // TODO: Use throw_unless BadRequestHttpException in Laravel 5.5
               throw new BadRequestHttpException(config('ghwebhooks.modelerror', "This repository doesn't exist in this application."));
           }
           event(new $class($model, $data));
           return response()->json(config('ghwebhooks.response', ['message' => 'Event successfully received.']));
         }

         event(new $class($data));
         return response()->json(config('ghwebhooks.response', ['message' => 'Event successfully received.']));
     }

    /**
     * Check if a webhook request came from GitHub.
     *
     * @return boolean
     */
    protected function githubSignatureIsValid() : bool
    {
        $gitHubSignature = request()->header('X-Hub-Signature', 'PlaceHolderHash');
        list($usedAlgorithm, $gitHubHash) = explode('=', $gitHubSignature, 2);
        $payload = file_get_contents('php://input');
        $calculatedHash = hash_hmac($usedAlgorithm, $payload, config('ghwebhook.secret'));

        return $calculatedHash === $gitHubHash;
    }
}
