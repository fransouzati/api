<?php

namespace Domain\Http;

use App\Http\Controllers\Controller;
use Domain\Http\Requests\ContactStoreRequest;
use Mail;

class ContactController extends Controller
{
    /**
     * Envia email.
     *
     * @return Response
     */
    public function store(ContactStoreRequest $request)
    {
        $r = Mail::send('emails.contacts', $request->all(), function ($message) use ($request) {
            $message
                ->replyTo($request->email)
                ->to(env('MAIL_TO'))
                ->subject('Conctact: As Igrejas!');
        });

        //Verifica se o email foi enviado com sucesso.
        if ($r) {
            return response()->json('Mensagem enviada com sucesso!', 200);
        }

        return response()->json('Houve algum problema e não foi possível enviar sua mensagem', 422);
    }
}
