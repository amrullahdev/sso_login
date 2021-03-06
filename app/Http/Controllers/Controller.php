<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public $SSO_LOGIN='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiYWI4MDc3ODc4YTNhY2FlOTVmYmQ0MjYwNDNhNWIwMmUwYTYxY2E5NjQyMTEyODZjZTM1NzlkNDU4YjU5NzhhYmNhNjVkOTcyNTQ2ZTRlMjgiLCJpYXQiOiIxNjEwMzQwNjAxLjQwNTA0MyIsIm5iZiI6IjE2MTAzNDA2MDEuNDA1MDUzIiwiZXhwIjoiMTY0MTg3NjYwMS4zODc2MzYiLCJzdWIiOiIxMjM0Iiwic2NvcGVzIjpbXX0.v4LoUWWB_autxHENRmgmA--tDdZKLMFQEZl_EcroGklMol3rMLO53ncreTzN0fjPRa1_0aNVZvTwCSAGFxJbZbAoRjqQoKBufbMNu3VA7a9aR0wGzLrW7V6zoIEUwzO7pALT5QQsloVlXCAfZ__6O7Kp_pks4TKwAHaYRaaQYcS-1TE9_mOqhjwMae5EU92KTTeXONLh2BjootVOS5QEz6of79EEhP-5ZfAUjncG7wrqyggEIytw-edYSDaGRVopakIQdGMW08-OFbkjaNmsY9CIbQpkQCcHr9GdCzzsjZGwN_luw9bKh3N4lgZhpBXllH710Qu0gOcBLEHdORsnsrO16534aH41yH5IMrrsueDn-fXOJ5VgjOhOQitw5v_XyMrgsxLMVmgMkUGQUgnp-N5h4yV65BQEkpvz28qBlR31Ka7im8caaUhuq8YN_W8J9gQF_C9hP4Avgr-fymcvIHRhsNT-sLQVB61O1BYSaUJLEWjRKaaoCX5_MQrxX5Tzot47Doa_vFmjyaDKCIlml7Yne9f7xtx1yeZlStd2tHU127V4bqHqzW6fi6sxIAGLqgdjPYDa3CGl3EJY5rY5q6tdPtQCPYqb7MFLCi7ZiGWY4XvpwAXAejBktB5GWdc3ta0qihfDhdlBhnu5AypaL0rEm2zZkTy5rCr2gz_K2NE';

	public $BASE_URL='https://amr-sispen.herokuapp.com/';
}
