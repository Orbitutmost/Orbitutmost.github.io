# Smylie Plan For Thursday HOW TO: CODE 1
# EMAIL TONIGHT:
# > install links and basic tutorial for python and VS code
# > very breifly show where stuff is in VS Code and how to "pip install X"

# welcome to how to code!
# > Check installs
# > Just for my ref, how many people have coded before / brand new
# > We're skipping theory to get this done in an hour.

# Lets do step 1, get some output. You've seen this before, but you can
# learn a lot just from the basics:
from numpy import double


print("Hello World!")
#NOTE: Here we can see a function call (print()), String syntax ("Hello World"), and line
# syntax (no ";" at the end of lines)

# but that's jumping ahead
# so basics: Storing Data - Variables
a = 1
b = 2
c = "pokemon"
d = 4.5
e = True
h = [a,b,d] # this is an array, it holds multiple things. To get stuff out:
print(h[0]) # if you're coming from matlab, they're dumb, the rest of us index at zero
# this is BAD, dont just do alpha, give them names that mean something
number_1 = 1

# This lets me do things like
f = a + b
print(f)
g = d*b
print(g)

#NOTE: mass comment is ctrl-"/"
# but why am I even bothering with that first bit?
print(a+b)
print(d*g)

# why am i bothering at all?
print(1+2)
print(2*4.5)

# That works for addition, but what if my data is more complicated, or my action isnt just
# addition? welcome to functions and loops
print(h)
print(h*2)

# so how would i do each thing in that array?
h[0] *= 4 # this is how you shorthand A = A+B
h[1] *= 4
h[2] *= 4
# lots of stuff about to happen here, but i promise its simple
#NOTE: Tab delimited in python, so you need to indent correctly
for i in range(len(h)):
    h[i] = h[i]*2

print(h)
# So lets break that down some: 
# > perk of python, it reads like english for the most part
# > range(#) = [0,1,2, ... #]

# FOR EACH > yes python broke the syntax.
ab = [1,2,3,4]
for x in ab:
    print(x)

# functions
# > You've been seeing me do name(a,b), and I called print(), range(), len())
def doSomething(item_a, item_b):
    mySum = item_a+item_b
    return mySum

def arrayTimesnum(arrayHere, numHere):
    for i in range(len(arrayHere)):
        arrayHere[i] = arrayHere[i]*numHere
    return arrayHere

newArray = arrayTimesnum(h,4)
print(newArray)
# Loops, Functions, and Classes are your main structures in coding. But for most
# basic scripts in python, you don't need classes.

# extras: DECISIONS / INPUT / EXAMPLES / MORE VARIABLE TYPES / STRING MANIPULATION & BETTER PRINTS
# # DECISIONS
# thing_one = False
# thing_two = True
# if thing_one:
#     print("thing one true")
# elif thing_two: # "else if" shortened
#     print("thing two true")
# else:
#     print("neither true, both false")

# if thing_one and thing_two: # AND
#     print("Both true") 
# if thing_one or thing_two: # OR
#     print("one of them is true")
# if not thing_one: # NOT
#     print("thing one is false")
# # INPUT
# aa = input("enter num here: ")
# print(aa)
# # > but that's not "really" a number
# print(aa*2)
# print(float(aa)*2) # > oh hey look its casting
# # EXAMPLES:
# print("Examples:")
# examples = ["CoESplineConversions", "MohrCircleScript","phasorScript","vpbRipper","willXenoPuzzle"]
# examplesDesc = ["This does simple math on a large point array to scale and transform a spline",
#     "This takes the basic parameters for a mohrs circle and does it for me",
#     "This does phase conversions for mechatronics between rect, trig, and imaginary",
#     "This takes a bunch of screenshots of a digital textbook and spits out a PDF",
#     "This is just a game from an activity in Destiny 2 that I wanted to learn"]
# for i in range(len(examples)):
#     print("{}: {}".format(examples[i],examplesDesc[i]))
# print("Pick One!")
# # MORE VARS
# v1 = (0,1) # tuple (LOCKED - no edits allowed)
# v2 = [[0,1],[2,3]] # 2D array
# v3 = v4 = v5 = 12 # multiple assignment, NOTE: Same MEMORY location too
# v6,v7,v8 = 1,2,3 # sequential assignment 
# # Where would i use sequential assignment? To throw away outputs
# def someFunction():
#     return 1,2
# _, v9 = someFunction()
# v10 = {"one":1, "two":2, "three":3}
# print(v10.keys())
# print(v10.values())


