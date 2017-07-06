<?php
namespace Df\ZohoBI\Source;
use Df\ZohoBI\App;
// 2017-07-06
final class Organization extends \Df\Config\Source\API {
	/**
	 * 2017-07-06
	 * @override
	 * @see \Df\Config\Source\API::fetch()
	 * @used-by \Df\Config\Source\API::map()
	 * @return array(string => string)
	 */
	protected function fetch() {return [];}

	/**
	 * 2017-07-06
	 * @override
	 * @see \Df\Config\Source\API::isRequirementMet()
	 * @used-by \Df\Config\Source\API::map()
	 * @return bool
	 */
	protected function isRequirementMet() {return $this->ss()->token();}

	/**
	 * 2017-07-06
	 * @override
	 * @see \Df\Config\Source\API::requirement()
	 * @used-by \Df\Config\Source\API::map()
	 * @return string
	 */
	protected function requirement() {return 'Specify the «Authentication Token» first.';}

	/**
	 * 2017-07-06
	 * @return App
	 */
	private function app() {return dfc($this, function() {return df_zoho_app(
		'Dfe_Zoho' . ucfirst($this->pathA()[1])
	);});}

	/**
	 * 2017-07-06
	 * @return \Df\ZohoBI\Settings
	 */
	private function ss() {return $this->app()->ss();}
}