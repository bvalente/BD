import random;
file = open("text.txt", "w")
numCamara = []
for a in range(1,101):
    numCamara.append(a)

Local = []

for b in range(1,101):
    Local.append('"local'+str(b)+'"')

Vigia =[]
for a in range(1,101):
    exLocal = Local[random.randrange(len(Local))]
    exNumCamara = numCamara[random.randrange(len(numCamara))]

    l = (exLocal,exNumCamara)
    if l in Vigia:
        print("repeat")
        continue
    Vigia.append(l)
for elem in Vigia:
    print(elem)
