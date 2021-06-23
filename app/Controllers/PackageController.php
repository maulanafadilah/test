<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Package;

class PackageController extends BaseController
{
	public function dashboard(){
		return view('admin/index');
	}
	public function index()
	{

		$package = new Package;
		$data = $package->findAll();
		return view('admin/package/index', compact('data'));
	}

	public function create(){
		return view('admin/package/create');
	}

	public function store(){
		$name = $this->request->getVar('name');
		$type = $this->request->getVar('type');
		$location = $this->request->getVar('location');
		$price = $this->request->getVar('price');
		$features = $this->request->getVar('features');
		$detail = $this->request->getVar('detail');
		$file = $this->request->getFile('foto');
		$namaFoto = $file->getName();

		$data = [
			'name' => $name,
			'type' => $type,
			'foto' => $namaFoto,
			'location' => $location,
			'price' => $price,
			'package_features' => $features,
			'package_detail' => $detail,
		];

		$package = new Package;
		$insert = $package->insert($data);
		
		if($insert){
			$file->move('image/', $namaFoto);
			return redirect()->to('/package');
		}
	}

	public function edit($id){
		$package = new Package;
		$data = $package->find($id);
		return view('admin/package/edit', compact('data'));
	}

	public function update(){
		$id = $this->request->getVar('id');
		$name = $this->request->getVar('name');
		$type = $this->request->getVar('type');
		$location = $this->request->getVar('location');
		$price = $this->request->getVar('price');
		$features = $this->request->getVar('features');
		$detail = $this->request->getVar('detail');
		$file = $this->request->getFile('foto');
		$namaFoto = $file->getName();

		if($namaFoto != ''){
			$data = [
				'name' => $name,
				'type' => $type,
				'foto' => $namaFoto,
				'location' => $location,
				'price' => $price,
				'package_features' => $features,
				'package_detail' => $detail,
			];
			$package = new Package;
			$insert = $package->update($id, $data);
			$file->move('image/', $namaFoto);
			if($insert){
				return redirect()->to('/package');
			}
		}else{
			$data = [
				'name' => $name,
				'type' => $type,
				'location' => $location,
				'price' => $price,
				'package_features' => $features,
				'package_detail' => $detail,
			];
			$package = new Package;
			$insert = $package->update($id,$data);
			if($insert){
				return redirect()->to('/package');
			}
		}
	}

	public function delete($id){
		$package = new Package;
		$package->delete($id);

		return redirect()->to('/package');
	}
}
