# webshop
Class assignment in PHP

## Assignment: Create a web shop with the following Pages and requirements

• User/customer must be able to browse/navigate to
    o Landing/front page
    o Products page
    o Login + register page
    
• Administrator must be able to browse/navigate to
    o Repository page
    o Landing/front page
    o Products page
    o Login page (Administrator registration is not required. You maymanually add administrator to the Database)

• The system must use session to know about the logged in user. If the loggedin user is Administrator then he should be allowed   to use Repository pageotherwise ( if he is not admin) the system should display a message e.g.(Restricted Area: requires         authentication)

• The registration page must show a registration form containing the followingfields
    o Name
    o Phone number
    o Address
    o E-mail (e-mail must be used as username for log-in page)

• You must validate form fields using Regular expression
    o Name as alphabets
    o Phone number as 8 digits. (Country code validation is not required)
    o Address as alphanumeric, commas and white spaces
    o E-mail as a common e-mail format (The email does not have to exist inreal)

• Must show a message if any field fails to match the reg-ex pattern.

• Landing page must
    1. At least have 2 level nested dynamic menu i.e. a menu and sub-menu
       populated from the database products table
       
       
• Products page must
    1. Show a list of products related to the menu item user has clicked on in
       Landing page e.g. if user has clicked, under Electronics, on smart-phones
       then the product page must show smart-phones.

    2. Product must be presented as:
        a. Name
        b. Image
        c. Price

    3. Must be possible to add the number of items user wants to buy

    4. Must show total price
    
    5. Should show a shopping cart

• Administrator

    1. The Repository page should present a form, which submits the products to
       the Database. The form should have the necessary fields e.g.
        a. Product Name
        b. Image path
        c. Price
        d. Etc..

    2. The repository page must show the Products present in the Database. Only
        the name, total number of Products and the price. (image is not required
        on this page)

    3. Must be able to Update the Products in the database
       Administrator and Registered user must be able to log off.


