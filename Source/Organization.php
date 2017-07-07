<?php
namespace Df\ZohoBI\Source;
use Df\ZohoBI\App;
// 2017-07-06
final class Organization extends \Df\Config\Source\API {
	/**
	 * 2017-07-07
	 * I show the organizanization ID in the title,
	 * because I have noticed that an orgranization name is not unique (at least, for Zoho Inventory):
	 *	{
	 *		"code": 0,
	 *		"message": "success",
	 *		"organizations": [
	 *			{
	 *				"organization_id": "2723074",
	 *				"name": "Mage2.PRO",
	 *				<...>
	 *			},
	 *			{
	 *				"organization_id": "649147519",
	 *				"name": "Mage2.PRO",
	 *				<...>
	 *			}
	 *		]
	 *	}
	 * @override
	 * @see \Df\Config\Source\API::fetch()
	 * @used-by \Df\Config\Source\API::map()
	 * @return array(string => string)
	 */
	protected function fetch() {return df_map_r(function($v) {return [
		$v['organization_id'], "{$v['name']} ({$v['organization_id']})"
	];}, $this->app()->f()->organizations());}

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