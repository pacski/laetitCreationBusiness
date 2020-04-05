<?php

namespace App\Toolbox;

use Validator;

class ResponseManagement
{
    protected $code = null;
    protected $errors = [];
    protected $datas = [];
    protected $message = null;

    public function hasErrors ()
    {
        return count($this->errors) > 0;
    }

    public function setCode ($code = null)
    {
        $this->code = $code;

        return $this;
    }

    public function setData ($mixedKey, $value = null)
    {
        if (is_array($mixedKey))
        {
            $this->datas = $mixedKey;
        }
        elseif (is_object($mixedKey))
        {
            $this->datas = $mixedKey;
        }
        else
        {
            $this->datas[$mixedKey] = $value;
        }

        return $this;
    }

    public function setError ($mixedKey, $value = null)
    {
        if (is_array($mixedKey))
        {
            $this->errors = $mixedKey;
        }
        elseif (is_object($mixedKey))
        {
            $this->errors = $mixedKey;
        }
        else
        {
            $this->errors[$mixedKey] = [$value];
        }

        return $this;
    }

    public function setMessage ($message = null)
    {
        $this->message = $message;

        return $this;
    }

    public function getMessage ()
    {
        return $this->message;
    }

    public function getDatas ()
    {
        return $this->datas;
    }

    public function getErrors ()
    {
        return $this->errors;
    }

    public function response ($body = null, $code = null)
    {
        if (!empty($this->errors) && !is_array($this->errors))
        {
            $body = $this->errors->toArray();
        }

        if (empty($body))
        {
            if ($this->errors instanceof Illuminate\Support\MessageBag)
            {
                $errors = $this->errors->toArray();
                if (!empty($errors))
                {
                    $body = ['errors' => $errors];
                }
            }
            elseif (!empty($this->errors))
            {
                $body = ['errors' => $this->errors];
            }

            if (!empty($this->datas))
            {
                $body = ['data' => $this->datas];
            }

            if (!empty($this->message))
            {
                $body['message'] = $this->message;
            }

            if (empty($body))
            {
                $body = ['status' => 'success'];
            }
        }

        $code = empty($code) ? $this->code : $code;

        return [ 'body' => $body, 'code' => $code ];
    }

    public function validator ($params = [], $rules = [])
    {
        $validator = Validator::make($params, $rules);

        if ($validator->fails())
        {
            return $this->setError($validator->errors())
            ->setMessage('Something is wrong with your submission')
            ->setCode(400)->response();
        }
        else
        {
            return $this->setCode(200)->response();
        }
    }
}
