// SPDX-License-Identifier: GPL-3.0
pragma solidity ^0.8.2;

/**
comment
 */
contract RideShare_order {

    struct Order {      
      string username;
      string driver;
      string long;
      string lat;
      string dest_long;
      string dest_lat;
      string status;
   }
   
    Order[] Data_order;
    uint number = 0;
    
    function inp_order(string memory _username,string memory _driver, string memory _long,string memory _lat,
    string memory _dest_long,string memory _dest_lat) public returns (bool){
        Order memory inp;
        bool notfound = true;
        for (uint i=0; i<Data_order.length; i++){
            if(keccak256(bytes(Data_order[i].username)) == keccak256(bytes(_username))){
              notfound = false;
            }
            if(keccak256(bytes(Data_order[i].driver)) == keccak256(bytes(_driver))){
              notfound = false;
            }
        }
        if(notfound){
            inp.username = _username;
            inp.driver = _driver;
            inp.long = _long;
            inp.lat = _lat;
            inp.dest_long = _dest_long;
            inp.dest_lat = _dest_lat;
            inp.status = "waiting";
            Data_order.push(inp);
        }
        return notfound;
    }

    function get_order(string memory _username) public view returns (string memory,string memory,string memory,string memory,
    string memory,string memory,string memory ){
        Order memory x;
        for (uint i=0; i<Data_order.length; i++){
            if(keccak256(bytes(Data_order[i].username)) == keccak256(bytes(_username))){
              x = Data_order[i];
            }
        }return (x.username,x.driver,x.long,x.lat,x.dest_long,x.dest_lat,x.status);
    }
    
    function get_order_driver(string memory _driver) public view returns (string memory,string memory,string memory,string memory,
    string memory,string memory,string memory ){
        Order memory x;
        for (uint i=0; i<Data_order.length; i++){
            if(keccak256(bytes(Data_order[i].driver)) == keccak256(bytes(_driver))){
              x = Data_order[i];
            }
        }return (x.username,x.driver,x.long,x.lat,x.dest_long,x.dest_lat,x.status);
    }


    function acc_order(string memory _driver)public returns (string memory){
        for (uint i=0; i<Data_order.length; i++){
            if(keccak256(bytes(Data_order[i].driver)) == keccak256(bytes(_driver))){
              Data_order[i].status = "accepted";
              return "return";
            }}
            return "XD";
    }

    function cancel_order(string memory _username)public{
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_order.length; i++){
            if(keccak256(bytes(Data_order[i].username)) == keccak256(bytes(_username))){
                x = i;
                found = true;
            }}
            
        if(found){
             for (uint i=x; i<(Data_order.length-1); i++){
                Data_order[i]=Data_order[i+1];
             }
            Data_order.pop();
        }
    }

    function cancel_order_driver(string memory _driver)public {
        uint x=0;
        bool found = false;
        for (uint i=0; i<Data_order.length; i++){
            if(keccak256(bytes(Data_order[i].driver)) == keccak256(bytes(_driver))){
                x = i;
                found = true;
            }}
            
        if(found){
             for (uint i=x; i<(Data_order.length-1); i++){
                Data_order[i]=Data_order[i+1];
             }
            Data_order.pop();
        }
    }
    
    function ret_all() public view returns(Order[] memory){
        return Data_order;
    }
    function ret_length() public view returns(uint){
        return Data_order.length;
    }
}
