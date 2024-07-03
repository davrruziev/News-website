<?php
namespace App\Services;

class SendMailService
{
    public function sendMail($request)
    {
        $data = $request->all();
        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('files/',$filename);
            $data['file']='files/'.$filename;
        }
        return $data;
    }
}
