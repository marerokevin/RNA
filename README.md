CREATE TABLE users (
    id INT(20) PRIMARY KEY NOT null AUTO_INCREMENT,
    id_number varchar(256),
    first_name varchar(256) not null,
    last_name varchar(256) not null,
    suffix varchar(256),
    email_addres varchar(256),
    location varchar(256),
    telephone_number varchar(256),
    department varchar(256),
    date datetime not null,
    section varchar(256));

LOAD DATA LOCAL INFILE '/var/www/html/DNA/users.csv'
    INTO TABLE users 
        FIELDS
        TERMINATED BY ',' 
        LINES TERMINATED BY '\n'
        IGNORE 1 rows (id_number,first_name,last_name,suffix,email_addres,location,telephone_number,department,section);

CREATE TABLE accounts (
    id INT(20) PRIMARY KEY NOT null AUTO_INCREMENT,
    date datetime not null,
    user_uid varchar(256) not null,
    first_name varchar(256) not null,
    last_name varchar(256) not null,
    suffix varchar(256) not null,
    user_pwd varchar(256) not null,
    user_cpwd varchar(256),
    user_level varchar(13) not null,
    email_address varchar(50) not null,
    section varchar(256) not null,
    department varchar(256) not null);

sudo dnf update
sudo dnf upgrade --refresh
sudo dnf install dnf-plugin-system-upgrade
sudo dnf --refresh upgrade
sudo dnf system-upgrade download --releasever=37
sudo dnf system-upgrade reboot

    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

    t.ozawa@glory.com.ph
    6l0ry810

xrandr --output HDMI-A-0 --mode 1920x1080 --primary --output eDP --mode 1366x768 --left-of HDMI-A-0

    count connected 
    netstat -ntu|awk '{print $5}'|cut -d: -f1 -s |cut -f1,2,3 -d'.'|sed 's/$/.0/'|sort|uniq -c|sort -nk1 -r

    count specific ip address
    sudo netstat -ntu | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -n

    block isp
    sudo route add ADDRESS reject

    1   104.232.27.251
    1   148.163.157.68
    1   185.30.177.71
    1   203.83.243.5
    1   204.135.226.228
    1   209.85.215.172
    1   23.201.75.192
    1   Address
    1   servers)
    2   58.69.86.34
    3   121.50.46.86
    3   203.83.240.55
    7   
    37  127.0.0.1
    68  112.199.69.18

    IF2022081500107

maica

create different views for the users s

Super Administrator
    -oversee everything happening on the system.

Head MIS/FEM
    -assign task to the support team
    -cancel imbecile support requests
    -Elevate the status of a task
    -schedule activities

MIS/FEM - Support Team
    -Perform task
    -Update what is happening on the tasks

Head
    -Approve requests of user
    -Create requests directly

User
    -Creates requests
    -review previous requests
    -read Guides

    change include on click of <a>

    bullshit

// var x = 0;
// function tablet1() {
//   function xchange(){
//       x = 1;
//     xchange();
//     if (x == 1) {
//       document.getElementById("create").className = "navticket-on";
//       document.getElementById("approval").className = "navticket-off";
//       document.getElementById("confirm").className = "navticket-off";
//       document.getElementById("status").className = "navticket-off";
//       console.log(x);
//     } else {
//       document.getElementById("create").className = "navticket-on";
//       document.getElementById("approval").className = "navticket-off";
//       document.getElementById("confirm").className = "navticket-off";
//       document.getElementById("status").className = "navticket-off";
//       console.log(x+1);
//     }
//   }
// }

var x = 0;
function tablet2() {
  function xchange(){
    x = 2;
    y = document.getElementById("approval");
  }
  xchange();
  document.getElementById("create").className = "navticket-off";
  document.getElementById("approval").className = "navticket-on";
  document.getElementById("confirm").className = "navticket-off";
  document.getElementById("status").className = "navticket-off";
  console.log(x);
  console.log(y);
}

// var x = 0;
// function tablet3() {
//   function xchange(){
//     x = 3;
//   }
//   xchange();
//   if (x == 3){
//     console.log(x);
//     document.getElementById("create").className = "navticket-off";
//     document.getElementById("approval").className = "navticket-off";
//     document.getElementById("confirm").className = "navticket-on";
//     document.getElementById("status").className = "navticket-off";
//   }
// }

// var x = 0;
// function tablet4() {
//   function xchange(){
//     x = 4;
//   }
//   xchange();
//   if (x == 3){
//     console.log(x);
//     document.getElementById("create").className = "navticket-off";
//     document.getElementById("approval").className = "navticket-off";
//     document.getElementById("confirm").className = "navticket-off";
//     document.getElementById("status").className = "navticket-on";
//   }
// }

Fix registration on login.php (mukhang tanga)
