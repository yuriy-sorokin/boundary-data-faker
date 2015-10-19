Boundary data faker
=============

To properly test boundary conditions of your form / entity, you need to generate quite a lot of data, which exceeds boundary conditions / values.
 
Say, you have User entity with 2 required fields `name` and `email`, and 1 optional, which is `age`.
  
    The validation rules are:
    - name
        - 3-20 chars long
    - email
        - 5-50 chars long
        - a regular expression
    - age
        - numeric
        - greater then 18
    
In order to have all cases, which must throw an exception covered, you need to manually create quite a big amount of data:
    - ['name' => '']   
    - ['name' => '12']   
    - ['name' => 'a string, which length is more than 20 chars']
    - ['email' => '']   
    - ['email' => '1234']   
    - ['email' => 'a string, which length is more than 50 chars']
    - ['age' => 'string']
    - ['age' => 0]
