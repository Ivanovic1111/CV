
Home
Uncategorized
How To Create A Contact Form In PHP
How To Create A Contact Form In PHP
Uncategorized 2015-08-25 No Comments
Follow by Email
Facebook0
Google+
Twitter20

In todays article I am going to show you how to create a contact form for your website written in PHP. It is important to keep in contact with your consumers through your website.

 
Simple PHP contact form with process on same page

        Step 1: Create a single PHP file
        A PHP contact form is built of two parts: the actual contact form (what visitors see) and the script that processes the filled form and sends the email. They can be located in two different files, or they can be located in the same file, as you will see in the example below.

    Step 2: Copy the simple PHP contact form script from below
    We will create a simple PHP contact form, that will require the user to enter his name, email and message (see the above image). Below we will include the PHP contact form code, nicely highlighted, for your easy understanding. When the visitors opens the page with the form , the HTML code of the form is displayed (highlighted with black). After the users clicks the Send Email button, the user is taken to the same page, but a hidden parameter named action is set. This will prevent the script from displaying the form again and try to send the email (the code after the first else). The script verifies if all the fields were filled. If at least one was let empty, an error message is showed.

 

<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="30"/><br>
    Your email:<br>
    <input name="email" type="text" value="" size="30"/><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
        }
    else{        
        $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
        mail("ivanovicsvetlana@yahoo.com", $subject, $message, $from);
        echo "Email sent!";
        }
    }  
?> 