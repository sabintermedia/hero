# 'The Hero Game' Emag Challenge

## Instructions

- The program was developed and tested on PHP 7.4.7
- To run the program in Windows command line:
- - first unzip the archive or pull from git https://github.com/sabintermedia/emag-hero
- - Press win + start; type cmd; set your PHP path by typing 'set path=C:\xampp\php' replacing accordingly depending to your installation of PHP

* - navigate to location of unzipped files
* - start program by typing 'php index.php'

## Avant-propos

- The essence of this project is to see how you tackle an open subject so think outside the box (hopefully) and
  don't be afraid to add new features.
- Do not waste more than 3 hours . We are aware that you have other stuff to do , so we don't ask for the 'perfect answer'.
- Feel free to contact me at sebastian.blajevici@gmail.com if you have any questions.

## The Hero Challenge from eMag

eMAG’s Hero
The story
Once upon a time there was a great hero, called Orderus, with some strengths and weaknesses, as all heroes have.
After battling all kinds of monsters for more than a hundred years, Orderus now has the following stats:
● Health: 70 - 100
● Strength: 70 - 80
● Defence: 45 – 55
● Speed: 40 – 50
● Luck: 10% - 30% (0% means no luck, 100% lucky all the time).
Also, he possesses 2 skills:
● Rapid strike: Strike twice while it’s his turn to attack; there’s a 10% chance he’ll use this skill
every time he attacks
● Magic shield: Takes only half of the usual damage when an enemy attacks; there’s a 20%
change he’ll use this skill every time he defends.
Gameplay
As Orderus walks the ever-green forests of Emagia, he encounters some wild beasts, with the
following properties:
● Health: 60 - 90
● Strength: 60 - 90
● Defence: 40 – 60
● Speed: 40 – 60
● Luck: 25% - 40%
You’ll have to simulate a battle between Orderus and a wild beast, either at command line or using a web browser. On every battle, Orderus and the beast must be initialized with random properties, within their ranges.
The first attack is done by the player with the higher speed. If both players have the same speed,
than the attack is carried on by the player with the highest luck. After an attack, the players switch
roles: the attacker now defends and the defender now attacks.
The damage done by the attacker is calculated with the following formula:
Damage = Attacker strength – Defender defence
The damage is subtracted from the defender’s health. An attacker can miss their hit and do no
damage if the defender gets lucky that turn.
Orderus’ skills occur randomly, based on their chances, so take them into account on each turn.
Game over
The game ends when one of the players remain without health or the number of turns reaches 20.
The application must output the results each turn: what happened, which skills were used (if any),
the damage done, defender’s health left.
If we have a winner before the maximum number of rounds is reached, he must be declared
Rules
Emagia is a land where magic does happen. Still, for this magic to work, you’ll have to follow these
rules:
● Write code in plain PHP, without any frameworks (you are free to use 3rd parties like
PHPUnit, UI libs / frameworks)
● Make sure your application is decoupled, code reusable and scalable. For example, can a
new skill easily be added to our hero?
● Is your code bug-free and tested?
● There’s no time limit, take your time for the best approach you can think of