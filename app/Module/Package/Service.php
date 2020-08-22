<?php
namespace App\Module\Package;

use App\Model\Package;

class Service implements Contract
{
	private $package_repo;

	public function __construct(Package $package)
	{
		$this->package_repo = new PackageRepository($package);
	}

	public function listData()
	{
		return $this->package_repo->findAll();
	}
}
