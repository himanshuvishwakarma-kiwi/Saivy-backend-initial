<?php 
namespace App\Services;
 
class RegistrationService {

    /**
     * save record
     *
     * @param array $data
     * @param modelrepository
     * @return Model
     */
    public function saveData(array $userData,$userRepository){
        
        $userData['password'] = bcrypt($userData['password']);

        return $userRepository->create($userData);

    }
}