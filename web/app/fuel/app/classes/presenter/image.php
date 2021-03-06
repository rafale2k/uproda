<?php
class Presenter_Image extends Presenter_Uproda
{
	protected function build_thumbnail_url($basename, $ext)
	{
		if ($basename === null)
		{
			return \Theme::instanse()->asset->get_file('dummy.jpg', 'img');
		}
		else
		{
			return \Libs_Image_Thumbnail::build_url($basename, $ext);
		}
	}

	//imageパス作成
	protected function build_image_url($basename)
	{
		if ($basename === null)
		{
			return \Theme::instanse()->asset->get_file('dummy.jpg', 'img');
		}
		else
		{
			return \Uri::create('/image/:basename', ['basename' => $basename]);
		}
	}

	protected function build_image_real_url($basename, $ext)
	{
		if ($basename === null or $ext === null)
		{
			return \Theme::instanse()->asset->get_file('dummy.jpg', 'img');
		}
		else
		{
			return \Uri::create('/:image_dir/:image_short_dir/:basename.:ext', [
				'image_dir'       => Libs_Config::get('board.dir'),
				'image_short_dir' => Libs_Image::get_one_char_from_basename($basename),
				'basename'        => $basename,
				'ext'             => $ext,
			]);
		}
	}

	protected function hash($id)
	{
		return \Libs_Image::hash($id);
	}

}
