// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.2;

/**
comment
 */
contract RideShare {

    
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
   }
   
    Driver[] Data_driver;
   
    struct Order_input { 
      uint id_order;
      uint id_user;
      uint jam;
      string koordinat_asal;
      string daerah_asal;
      string koordinat_tujuan;
      string daerah_tujuan;
      uint jarak;
   }
   Order_input[] Data_orderin;
   
     struct Order_selesai { 
      uint id_order;
      uint id_driver;
      uint jam_ambil;
      uint jam_selesai;
      uint biaya;
      uint rate;
      string review;
   }
    Order_selesai[] Data_orderclear;
/**
Penumpang func
 */

    function daftar_penumpang( uint _id_user,string memory _username,string memory _password,string memory _nama,string memory _no_telepon,
    string memory _no_ktp,string memory _email) public returns (bool) {
        bool hasil = true;
        Penumpang memory inp;
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
                hasil = false;
            }
        } 
        if(hasil){
          inp.id_user = _id_user;
          inp.username = _username;
          inp.password = _password;
          inp.nama = _nama;
          inp.no_telepon = _no_telepon;
          inp.no_ktp = _no_ktp;
          inp.email = _email;
          Data_penumpang.push(inp);
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
    function get_penumpang(string memory _username) public view returns (Penumpang memory ){
        Penumpang memory x;
        for (uint i=0; i<Data_penumpang.length; i++){
            if(keccak256(bytes(Data_penumpang[i].username)) == keccak256(bytes(_username))){
              x = Data_penumpang[i];
            }
        }return x;
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
    
    
    function get_penumpang_alllengyg() public view returns(uint){
        return Data_penumpang.length;
        
    }
  
/**
Driver func
 */

    function daftar_driver( uint _id_driver,string memory _username,string memory _password, string memory _nama,string memory _no_telepon,
    string memory _no_ktp,string memory _email,string memory _plat) public returns (bool) {
        bool hasil = true;
        Driver memory inp;
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
                hasil = false;
            }
        }       
      if(hasil){
      inp.id_driver = _id_driver;
      inp.username = _username;
      inp.password = _password;
      inp.nama = _nama;
      inp.no_telepon = _no_telepon;
      inp.no_ktp = _no_ktp;
      inp.email = _email;
      inp.plat = _plat;
      inp.rating = 0;
      Data_driver.push(inp);
      }
        return hasil;
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
    function get_driver(uint _id_driver) public view returns (Driver memory ){
        Driver memory x;
        for (uint i=0; i<Data_driver.length; i++){
            if(Data_driver[i].id_driver == _id_driver){
               x = Data_driver[i];
            }
        }return x;
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
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_driver.length; i++){
            if(keccak256(bytes(Data_driver[i].username)) == keccak256(bytes(_username))){
              x = i;
              found = true;
            }
        }
        if(found){
            if(keccak256(bytes(Data_driver[x].password)) == keccak256(bytes(_password))){
                Data_driver[x].password = _newpass;
            }
        }
    }
    
 /**
Order_input func
 */   
    function daftar_order( uint _id_order, uint _id_user, string memory _k_asal,string memory _daerah_asal,
                            string memory _k_tujuan, string memory _daerah_tujuan,uint _jarak) public {
      Order_input memory inp;
      inp.id_order = _id_order;
      inp.id_user = _id_user;
      inp.jam = block.timestamp;
      inp.koordinat_asal = _k_asal;
      inp.daerah_asal = _daerah_asal;
      inp.koordinat_tujuan = _k_tujuan;
      inp.daerah_tujuan = _daerah_tujuan;
      inp.jarak = _jarak;
      Data_orderin.push(inp);
    }
    
    function get_orderin_all() public view returns(Order_input[] memory){
        return Data_orderin;
        
    }
    
    function get_orderin(uint _id_order) public view returns (Order_input memory ){
        Order_input memory x;
        for (uint i=0; i<Data_orderin.length; i++){
            if(Data_orderin[i].id_order == _id_order){
               x = Data_orderin[i];
            }
        }return x;
    }
    
 /**
Order_get func
 */      
    
    function clear_order( uint _id_order, uint _id_driver, uint _jam_ambil, 
                            uint _biaya, uint _rate, string memory _review) public {
      Order_selesai memory inp;
      inp.id_order = _id_order;
      inp.id_driver = _id_driver;
      inp.jam_ambil = _jam_ambil;
      inp.jam_selesai = block.timestamp;
      inp.biaya = _biaya;
      inp.rate = _rate;
      inp.review = _review;
      Data_orderclear.push(inp);
    }
    
    function get_orderclear_all() public view returns(Order_selesai[] memory){
        return Data_orderclear;
        
    }
    
    function get_orderclear(uint _id_order) public view returns (Order_selesai memory ){
        Order_selesai memory x;
        for (uint i=0; i<Data_orderclear.length; i++){
            if(Data_orderclear[i].id_order == _id_order){
               x = Data_orderclear[i];
            }
        }return x;
    }
        
/**
endd
 */
    
}
