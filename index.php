<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">
        <header>Registration Form</header>
        <form action="./admin/registration.php" method="POST" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type ="text" name="fullname" placeholder="Enter full name" required/>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type ="text" name="email" placeholder="Enter emali address"required/>
            </div>
            <div class="column">
                <div class="input-box">
                    <label> Phone Number</label>
                    <input type ="number" name="number" placeholder="Enter phone number" required/>
                </div>
                <div class="input-box">
                    <label>Birth Date</label>
                    <input type ="date" name="birthdate"  placeholder="Enter birth date" required/>
                </div>
            </div>
            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" checked />
                        <label for="check-male"> Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" checked />
                        <label for="check-female"> Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="gender" checked />
                        <label for="check-other"> Prefer not to say</label>
                    </div>
                </div>
            </div>
            <div class="input-box address">
                <label>Address</label>
                <input type ="text" name="street-address" placeholder="Enter street address" required/>
                <input type ="text" name="street-address-2" placeholder="Enter street address line 2" required/>

                <div class="column">
                    <div class="select-box">
                        <select name="country">
                            <option hidden>Country</option>
                            <option>America</option>
                            <option>Japan</option>
                            <option>Canada</option>
                            <option>United kingdom</option>
                            <option>UAE</option>
                            <option>Nepal</option>
                        </select>

                    </div>
                    <input type ="text" name="city" placeholder="Enter your city" required/>
                </div>

                <div class="column">
                    <input type ="text" name="region" placeholder="Enter your region" required/>
                    <input type ="number" name="postal-code" placeholder="Enter postal code" required/>
            
                </div>
                
            </div>
            
            <input type="submit" value="Submit"/>
        </form>
    </div>
</body>
</html>