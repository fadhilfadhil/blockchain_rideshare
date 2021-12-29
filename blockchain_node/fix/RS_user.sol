// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.2;

/**
comment
 */
contract RideShare_user {
    
    struct Penumpang { 
      uint id_user;     
      string username;
      string password;
      string nama;
      string no_telepon;
      string no_ktp;
      string email;
   }
   
    Penumpang[] Data_penumpang;
    uint number = 0;
/**
Penumpang func
 */

    function daftar_penumpang(string memory _username,string memory _password,string memory _nama,string memory _no_telepon,
    string memory _no_ktp,string memory _email) public returns (bool) {
        bool hasil = true;
        Penumpang memory inp;
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
                hasil = false;
            }
        } 
        if(hasil){
          inp.id_user = number;
          inp.username = _username;
          inp.password = _password;
          inp.nama = _nama;
          inp.no_telepon = _no_telepon;
          inp.no_ktp = _no_ktp;
          inp.email = _email;
          Data_penumpang.push(inp);
          number = number+1;
        }
        return hasil;
    }

    function penumpang_login(string memory _username,string memory _password) public view returns (bool, string memory ){
        bool hasil = false;
        string memory uid = 'username tidak ditemukan';
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
               if(keccak256(bytes(Data_penumpang[i].password)) == keccak256(bytes(_password))){
                   hasil = true;
                   uid = Data_penumpang[i].username;
               }else{
                   uid = 'password salah';
               }
            }
        
        } return (hasil,uid);       
    }

    function get_penumpang_all() public view returns(Penumpang[] memory){
        return Data_penumpang;
        
    }
    function get_penumpang(string memory _username) public view returns (string memory,string memory,string memory,string memory,string memory,string memory ){
        Penumpang memory x;
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
              x = Data_penumpang[i];
            }
        }return (x.username,x.password,x.nama,x.no_telepon,x.no_ktp,x.email);
    }

    function del_penumpang(string memory _username) public payable {
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
                x = i;
                found = true;
            }}
            
       
        if(found){
             for (uint i=x; i<(Data_penumpang.length-1); i++){
            Data_penumpang[i]=Data_penumpang[i+1];
             }
            Data_penumpang.pop();
        }
    }
    
    function change_pass_penumpang(string memory _username,string memory _password
    ,string memory _newpass) public payable{
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
              x = i;
              found = true;
            }
        }
        if(found){
            if(keccak256(bytes(Data_penumpang[x].password)) == keccak256(bytes(_password))){
                Data_penumpang[x].password = _newpass;
            }
        }
    }
    
    function change_no_penumpang(string memory _username,string memory _password
    ,string memory _no_telepon) public payable{
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
              x = i;
              found = true;
            }
        }
        if(found){
            if(keccak256(bytes(Data_penumpang[x].password)) == keccak256(bytes(_password))){
                Data_penumpang[x].no_telepon = _no_telepon;
            }
        }
    }
    
    function change_email_penumpang(string memory _username,string memory _password
    ,string memory _email) public payable{
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
              x = i;
              found = true;
            }
        }
        if(found){
            if(keccak256(bytes(Data_penumpang[x].password)) == keccak256(bytes(_password))){
                Data_penumpang[x].email = _email;
            }
        }
    }
    
    function get_penumpang_alllengyg() public view returns(uint){
        return Data_penumpang.length;
        
    }
  


}