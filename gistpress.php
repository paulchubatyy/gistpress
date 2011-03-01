<?php
/*
Plugin Name: GistPress
Plugin URI: http://wordpress.org/extend/plugins/github-gist
Description: Embed your gists to posts
Usage: add gist id and file (if required)

[gist id="847852" file="gistpress.php"/]

Version: 0.1
Author: Paul Chubatyy
Author URI: http://xobb.citylance.biz/gistpress

Copyright 2011 Paul Chubatyy

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class Gistpress {

	public function __construct()
	{
		add_shortcode('gist', array($this, 'shortcode_handler'));
	}

	public function shortcode_handler($params)
	{
		extract($params);
		return $this->embed_code($id, $file);
	}

	protected function embed_code($id, $file = NULL)
	{
		$url = "https://gist.github.com/{$id}.js";
		if ($file != NULL)
			$url .= "?file={$file}";
		return "<script type='text/javascript' src='{$url}'></script>";
	}
}

new GistPress;
