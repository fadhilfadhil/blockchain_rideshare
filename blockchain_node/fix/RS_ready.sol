// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.2;

/**
comment
 */
contract RideShare_ready {

    struct Ready {      
      string username;
      string long;
      string lat;
      string hp;
      string status;
   }
   
    Ready[] Data_ready;
    uint number = 0;
    
    function driver_login(string memory _username,string memory _long,string memory _lat, string memory _hp) public{
        Ready memory inp;
        bool notfound = true;
        for (uint i=0; i<Data_ready.length; i++){
            if(keccak256(bytes(Data_ready[i].username)) == keccak256(bytes(_username))){
              notfound = false;
            }
        }
        if(notfound){
            inp.username = _username;
            inp.long = _long;
            inp.lat = _lat;
            inp.hp = _hp;
            inp.status = "notready";
            Data_ready.push(inp);
        }

    }

    function status_ready(string memory _username) public payable{
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_ready.length; i++){
            if(keccak256(bytes(Data_ready[i].username)) == keccak256(bytes(_username))){
              x = i;
              found = true;
            }
        }
        if(found){
            Data_ready[x].status = "rede";
        }
    }
    
    function status_notready(string memory _username) public payable{
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_ready.length; i++){
            if(keccak256(bytes(Data_ready[i].username)) == keccak256(bytes(_username))){
              x = i;
              found = true;
            }
        }
        if(found){
            Data_ready[x].status = "notready";
        }
    }

    function del_ready(string memory _username) public payable {
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_ready.length; i++){
            if(keccak256(bytes(Data_ready[i].username)) == keccak256(bytes(_username))){
                x = i;
                found = true;
            }}
            
        if(found){
             for (uint i=x; i<(Data_ready.length-1); i++){
                Data_ready[i]=Data_ready[i+1];
             }
            Data_ready.pop();
        }
    }
    
    function get_ready(string memory _username) public view returns (string memory,string memory,string memory,string memory, string memory ){
        Ready memory x;
        for (uint i=0; i<Data_ready.length; i++){
            if(keccak256(bytes(Data_ready[i].username)) == keccak256(bytes(_username))){
              x = Data_ready[i];
            }
        }return (x.username,x.long,x.lat,x.hp,x.status);
    }

    function get_ready_all() public view returns(Ready[] memory){
        return Data_ready;
        
    }
    function get_ready_length() public view returns(uint){
        return Data_ready.length;
    }

    function get_ready_idx(uint idx) public view returns (string memory,string memory,string memory,string memory, string memory  ) {
        return (Data_ready[idx].username,Data_ready[idx].long,Data_ready[idx].lat,Data_ready[idx].hp,Data_ready[idx].status);
    }
}

