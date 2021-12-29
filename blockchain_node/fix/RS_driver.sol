// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.2;

/**
comment
 */
contract RideShare_driver {

    struct Driver { 
      uint id_driver;      
      string username;
      string password;
      string nama;
      string no_telepon;
      string no_ktp;
      string email;
      string plat;
      uint rating;
      string no_stnk;
      string skck;
      string status;
      uint total;
      string pict;
   }
   
    Driver[] Data_driver;
    uint number = 0;

  
/**
Driver func
 */

    function daftar_driver(string memory _username,string memory _password, string memory _nama,string memory _no_telepon,
    string memory _no_ktp,string memory _email,string memory _plat) public returns (bool) {
        bool hasil = true;
        Driver memory inp;
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
                hasil = false;
            }
        }       
      if(hasil){
      inp.id_driver = number;
      inp.username = _username;
      inp.password = _password;
      inp.nama = _nama;
      inp.no_telepon = _no_telepon;
      inp.no_ktp = _no_ktp;
      inp.email = _email;
      inp.plat = _plat;
      inp.rating = 0;
      inp.no_stnk = "";
      inp.skck =  "";
      inp.pict =  "";
      inp.status = "unverified";
      inp.total = 0;
      Data_driver.push(inp);
      number = number+1;
      }
        return hasil;
    }

    function verif_driver (string memory _username) public payable{
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
              Data_driver[i].status = "verified";
            }
        }    
    }
    
    
    function driver_login(string memory _username,string memory _password) public view returns (bool, string memory ){
        bool hasil = false;
        string memory uid = 'username tidak ditemukan';
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
               if(keccak256(bytes(Data_driver[i].password)) == keccak256(bytes(_password))){
                   hasil = true;
                   uid = Data_driver[i].username;
               }else{
                   uid = 'password salah';
               }
            }
        
        }  return (hasil,uid);      
    }

    function get_driver_all() public view returns(Driver[] memory){
        return Data_driver;
        
    }
    function get_driver(string memory _username) public view returns (string memory,string memory,string memory,string memory,string memory,string memory,
    string memory,uint,string memory,uint,string memory,string memory){
        Driver memory x;
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
              x = Data_driver[i];
            }
        }return (x.username,x.password,x.nama,x.no_telepon,x.no_ktp,x.email,x.plat,x.rating,x.no_stnk,x.total,x.status,x.pict);
    }
    

    function del_driver(string memory _username) public payable{
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
                x = i;
                found = true;
            }}

        
        if(found){
            for (uint i=x; i<(Data_driver.length-1); i++){
                Data_driver[i]=Data_driver[i+1];
            }
            Data_driver.pop();
        }
    }   
    
    function change_pass_driver(string memory _username,string memory _password
    ,string memory _newpass) public payable{
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
                if(keccak256(bytes(Data_driver[i].password)) == keccak256(bytes(_password))){
                    Data_driver[i].password = _newpass;
                }
            }
        }
    }
    
    function change_no_driver(string memory _username,string memory _password
    ,string memory _no_telepon) public payable{
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
                if(keccak256(bytes(Data_driver[i].password)) == keccak256(bytes(_password))){
                    Data_driver[i].no_telepon = _no_telepon;
                }
            }
        }
    }
    
    function change_email_driver(string memory _username,string memory _password
    ,string memory _email) public payable{
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
                if(keccak256(bytes(Data_driver[i].password)) == keccak256(bytes(_password))){
                    Data_driver[i].email = _email;
                }
            }
        }
    }
    
    function update_rating(string memory _username, uint _rating) public payable {
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
              Data_driver[i].total++;     
              Data_driver[i].rating +=_rating;      
            }
        }
    }

    function update_skck(string memory _username, string memory _skck) public payable {
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
              Data_driver[i].skck = _skck;          
            }
        }
    }

    function update_stnk(string memory _username, string memory _stnk) public payable {
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
              Data_driver[i].no_stnk = _stnk;      
            }
        }
    }

    function update_pict(string memory _username, string memory _pict) public payable {
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
              Data_driver[i].pict = _pict;      
            }
        }
    }

}
