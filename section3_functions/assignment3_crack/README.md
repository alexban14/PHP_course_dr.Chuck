# Optional chalanges to do in order to improve the app

======================================================

Optional Challenges

This section is entirely optional and is here in case you want to explore a bit more deeply and test your code skillz.

Here are some possible improvements:

    For fun, crack all of the pins at the top of this document and figure out why each person chose their PIN.
    You can crack some but not all more complex hashed values using a site like: CrackStation.net. For fun, use this site to crack all the above hash values.
    Make your application test a more complex character set like, upper case letters, lower case letters, numbers, and common punctuation.
    Change the code so when it finds a match, it breaks out of all four of the nested loops. So if the PIN turned out to be 1234 it would only run that many times. Hint: Make a logical variable that you set to true when you get a match and then as soon as that becomes true, break out of the outer loops.
    Make your program handle longer strings - say six characters. At some point when you increase the number of characters and alphabet, it will take longer to reverse crack the string.
    Change the debug output to print an attempt every 0.1 second instead of only the first 15 attempts.
    Super Advanced: Make your program handle variable length strings - perhaps looking for a string from 3-7 characters long. At some point just making more nested loops produces too much code and you should switch to a more complex but compact approach that uses a few arrays and a while loop. But this can be tricky to construct and prone to infinite loops if you are not careful. This is probably best not attempted unless you have some background in Algorithms and Data Structures.

As your program increases its character length, or tests longer passwords, it will start to slow down. Make sure to run these on your laptop (i.e. not on a server). Many hosted PHP systems prohibit these kinds of CPU-intensive tasks on their systems.

At some point you might run into a time out where PHP decides that your code is running too long and blows up your application. You can check the variable max_execution_time in your PHPInfo screen to see how many seconds PHP will let your code run before aborting it.
