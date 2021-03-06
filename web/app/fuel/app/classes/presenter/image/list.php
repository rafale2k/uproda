<?php
class Presenter_Image_List extends Presenter_Image
{
	public function view()
	{
		parent::view();
		$per_page = \Libs_Config::get('board.pagination.per_page', 100);
		$offset = (\Arr::get($this->param, 'page', 1) - 1) * $per_page;
		$this->set('images', Libs_Image::get_images($offset, $per_page));
		$this->set('image_dir', Libs_Config::get('board.dir'));
		$this->set('thumbnail_dir', Libs_Config::get('board.thumbnail.dir'));
		$length = Libs_Config::get('board.thumbnail.lentgh', 400);
		$this->set('width', $length);
		$this->set('height', $length);

		//thumbnailパス作成
		$this->set_safe('build_thumbnail_url', function($basename, $ext) {
			return $this->build_thumbnail_url($basename, $ext);
		});

		//imageパス作成
		$this->set_safe('build_image_url', function($basename) {
			return $this->build_image_url($basename);
	  });

		$this->set_safe('format_bytes', function($bytes) {
			return \Num::format_bytes($bytes);
		});

		$this->set_safe('format_date', function($date) {
			return \Date::forge(strtotime($date))->format('%Y/%m/%d %H:%M');
		});

	}
}
