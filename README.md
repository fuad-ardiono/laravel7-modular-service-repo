**How to write modules ?**

1. Create new folder with name of module for example `Auth`
2. Then make Contract.php, Service.php, Controller.php, routes.php on `Auth` folder
3. Write your own business logic on Service.php dont forget write the contract to make your function is injectable
4. After write/code,go to ``Auth`` folder then git init and push your code to repo
5. Update your submodule
6. Finish

**Why modular?**

1 ) Easy to maintenance

if you need detach the module, you just delete your submodule  

2 ) Decouple the code layer

- Application layer (Service.php, Contract.php)
- Routes (Controller.php, routes.php)
- Database layer (app/Repository/*, app/Model/*)

3 ) SOLID

- Single-responsibility principle

A class should only have a single responsibility, that is, only changes to one part of the software's specification should be able to affect the specification of the class.

- Open–closed principle

"Software entities ... should be open for extension, but closed for modification."

- Liskov substitution principle

"Objects in a program should be replaceable with instances of their subtypes without altering the correctness of that program." See also design by contract.

- Interface segregation principle

"Many client-specific interfaces are better than one general-purpose interface."

- Dependency inversion principle
One should "depend upon abstractions, not concretions."
