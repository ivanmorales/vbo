<?php
define("DOMAIN", "www.villabuenaonda.com");
define("DOMAIN_REGEX", "/(https?:\/\/)([^\.\-]+\.[^\.]+\.\w{2,5})/");

class ChangeDomainCommand extends CConsoleCommand {


	protected $defaultDomain = DOMAIN;
	public $newDomain = DOMAIN;

	public $defaultAction = 'change';
	public $db = null;

	private $_options = array(
		'siteurl',
		'home'
		);

	public function init() {
		$this->db = Yii::app()->db;
	}


	private function fixOptions() {
		$cmd = $this->db->createCommand("SELECT * FROM wp_options WHERE option_name IN ('" . implode("','", $this->_options) . "')");

		$options = $cmd->queryAll();

		foreach($options as $option) {
			$domain = preg_replace(DOMAIN_REGEX, '$1' . $this->newDomain, $option['option_value']);
			$cmd
				->setText("UPDATE wp_options SET option_value = :domain WHERE option_id = :id;")
				->execute(array(
					'domain' => $domain,
					'id' => $option['option_id']));

			echo "Changed option: {$option['option_name']} to $domain \n";
		}
	}

	private function fixPosts() {
		$replacement = '$1' . $this->newDomain;
		$post_types = array('attachment');

		$cmd = $this->db
			->createCommand("SELECT ID, guid FROM wp_posts WHERE post_type IN ('" . implode("','", $post_types) . "')");

		$posts = $cmd->queryAll();

		foreach($posts as $post) {
			$domain = preg_replace(DOMAIN_REGEX, $replacement, $post['guid']);
			$cmd->setText("UPDATE wp_posts SET guid = :domain WHERE ID = :id;")
				->execute(array(
					'domain' => $domain,
					'id' => $post['ID']));
		}

		echo "Updated " . count($posts) . " posts with post_type IN (" . implode(",", $post_types) . ")\n";
	}

	private function fixPostMetas() {
		$replacement = '$1' . $this->newDomain;

		$meta_keys = array('_st_page_builder_content', '_st_page_builder');
		$cmd = $this->db
			->createCommand("SELECT * FROM wp_postmeta WHERE meta_key IN ('" . implode("','", $meta_keys) . "')");

		$metas = $cmd->queryAll();

		foreach($metas as $meta) {
			$encoded = $serialized = true;

			if (!($data = @base64_decode($meta['meta_value'])) && ($encoded = true)) {
				$data = $meta['meta_value'];
				$encoded = false;
			}

			if (!($data = @unserialize($data)) && ($serialized = true)) {
				$data = $meta['meta_value'];
				$serialized = false;
			}

			if (isset($data['builder'])) {
				foreach($data['builder'] as $key => $slide) {
					if (!isset($slide['data']) || !isset($slide['data']['img']))
						continue;

					$domain = preg_replace(DOMAIN_REGEX, $replacement, $slide['data']['img']);
					$slide['data']['img'] = $domain;
					$data['builder'][$key] = $slide;
				}
			}

			if (isset($data['titlebar']) && isset($data['titlebar']['img'])) {
				$domain = preg_replace(DOMAIN_REGEX, $replacement, $data['titlebar']['img']);
				$data['titlebar']['img'] = $domain;
			}

			if (is_string($data)) {
				$data = preg_replace(DOMAIN_REGEX, $replacement, $data);
			}

			/* -------- DONE CHANGING DOMAIN  -----------*/

			if ($serialized)
				$data = serialize($data);

			if ($encoded)
				$data = base64_encode($data);

			$cmd
				->setText("UPDATE wp_postmeta SET meta_value = :value WHERE meta_id = :id")
				->execute(array(
					':value' => $data,
					':id' => $meta['meta_id']));

			echo "Updated Post Meta ID: {$meta['meta_id']}  KEY: {$meta['meta_key']}\n";
		}

	}

	public function actionChange() {
		$this->newDomain = $this->prompt("New Domain:", $this->defaultDomain);
		echo "\n";
		$this->fixOptions();

		echo "\n";
		$this->fixPosts();
		echo "\n";
		$this->fixPostMetas();
	}
}