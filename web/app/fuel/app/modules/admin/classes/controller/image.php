<?php
namespace Admin;
class Controller_Image extends Controller_Admin
{
	public function before()
	{
		parent::before();
	}

	public function action_index()
	{
		throw new \HttpNotFoundException();
	}

	public function post_delete()
	{
		try {
			if ( ! \Security::check_token())
			{
				throw new \Exception('token error');
			}

			$hash = \Security::clean(\Input::post('file'), ['strip_tags', 'htmlentities']);
			$v = \Validation::forge();
			$v->add_field('hash', 'hash', 'required|valid_string[alpha,numeric]');
			if ( ! $v->run(['hash' => $hash], true))
			{
				throw new \Exception('validate error: '.$hash);
			}

			//管理者モードで削除
			\Libs_Image::delete_by_hash($hash, null, true);
			//失敗は無視して管理の画像一覧へリダイレクト
			\Response::redirect('admin/images');
		} catch (\Exception $e) {
			//例外は無視してログインページへ飛ばす
			\Response::redirect('admin/login');
		}
	}
}

