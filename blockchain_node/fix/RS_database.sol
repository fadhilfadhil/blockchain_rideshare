// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.2;

/**
comment
 */
contract RideShare_database {

    struct Database {
      uint id;      
      string username;
      string driver;
      string hp;
      string start_long;
      string start_lat;
      string dest_long;
      string dest_lat;
      string waktu_acc;
      string waktu_jemput;
      string waktu_selesai;
      string status;
      uint rating;
   }
   
    Database[] Data_database;
    uint number = 0;
    
    function db_acc(string memory _username,string memory _driver,string memory _hp, string memory _start_long,string memory _start_lat,
    string memory _dest_long,string memory _dest_lat, string memory _waktu_acc) public returns(uint){
        Database memory inp;
            inp.username = _username;
            inp.driver = _driver;
            inp.hp = _hp;
            inp.start_long = _start_long;
            inp.start_lat = _start_lat;
            inp.dest_long = _dest_long;
            inp.dest_lat = _dest_lat;
            inp.waktu_acc = _waktu_acc;
            inp.waktu_jemput = "";
            inp.waktu_selesai = "";
            inp.status = "Waiting";
            inp.rating = 0;
            inp.id = number;
            Data_database.push(inp);
            number = number+1;
            return(number-1);
    }

    function db_start(uint _id,string memory _waktu_jemput)public {
            Data_database[_id].waktu_jemput = _waktu_jemput;
            Data_database[_id].status = "On The Way";

    }

    function db_end(uint _id,string memory _waktu_selesai,uint _rating)public {
            Data_database[_id].waktu_selesai = _waktu_selesai;
            Data_database[_id].status = "Success";
            Data_database[_id].rating = _rating;

    }

    function status_get(uint _id)public view returns(string memory){
        return Data_database[_id].status;
    }

    function get_id(string memory _username) public view returns(uint){
        uint x = 99999;
        for (uint i=0; i<Data_database.length; i++){
            if(keccak256(bytes(Data_database[i].username)) == keccak256(bytes(_username))){
              x = i;
            }
        }return x;
    }

    function ret_all() public view returns(Database[] memory){
        return Data_database;
    }
    function ret_length() public view returns(uint){
        return Data_database.length;
    }
}

