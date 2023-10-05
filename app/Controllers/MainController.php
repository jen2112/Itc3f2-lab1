<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
use App\Models\SecModel;
class MainController extends BaseController
{
    public function delete($data)
    {
        $main = new MainModel();
        $main->delete($data);
        return redirect()->to('/test');
    }
    
    
    public function updates(){
  
        $data =[
            'StudName' => $this->request->getPost('StudName'),
            'StudGender' => $this->request->getPost('StudGender'),
            'StudCourse' => $this->request->getPost('StudCourse'),
            'StudSection' => $this->request->getPost('StudSection'),
            'StudYear' => $this->request->getPost('StudYear'),
            'Section' => $this->request->getPost('Section'),
        ];
        $main = new MainModel();
        $main->set($data)->where($data)->update();
        return redirect()->to('/test');
    }
    public function update($ID)
    {
        $main = new MainModel();
        
        $data = [ 
            'main' => $main -> findAll(),
            'd'=> $main->find($ID),
        ];
        return view('main', $data);
    }

    public function save()
    {
        $ID = $this->request->getPost('ID');
        $data = [
            'StudName' => $this->request->getPost('StudName'),
            'StudGender' => $this->request->getPost('StudGender'),
            'StudCourse' => $this->request->getPost('StudCourse'),
            'StudSection' => $this->request->getPost('StudSection'),
            'StudYear' => $this->request->getPost('StudYear'),
            'Section' => $this->request->getPost('Section'),
        ];
        
        $main = new MainModel();

        if (!empty($ID)){
            $main->update($ID, $data);
        }
        else 
        {
            $main->save($data);
        }
        $sectionModel = new SecModel();
        $sectionData = [
            'Section' => $this->request->getPost('StudSection'),
        ];
        $existingSection = $sectionModel->where('Section', $this->request->getPost('StudSection')) ->first();

        if ($existingSection) {
            $sectionModel->set($sectionData)->where('ID', $existingSection ['ID'])->update();
        } 
        else{
            $sectionModel->save($sectionData);
        }

        return redirect()->to('/test');
    }
    public function test()
    {
        $main = new MainModel();
        $data['main'] = $main->findAll();
        return view ('main', $data);
    }
    public function index()
    {
        //
    }
}