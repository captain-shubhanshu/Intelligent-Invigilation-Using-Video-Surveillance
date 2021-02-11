# from tkinter import *
# import tkinter.messagebox
import cv2

# root = Tk()
face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
eye_cascade = cv2.CascadeClassifier('haarcascade_eye_tree_eyeglasses.xml')
cam = cv2.VideoCapture(0)       # turn on webcam

while cam.isOpened():
    _, img = cam.read()     # capture video
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)    # convert to grayscale
    faces = face_cascade.detectMultiScale(gray, 1.1, 4)     # detect face in ROI

    for (x, y , w ,h) in faces:
        cv2.rectangle(img, (x,y), (x+w, y+h), (255, 0 , 0), 3)
        roi_gray = gray[y:y+h, x:x+w]
        roi_color = img[y:y+h, x:x+w]
        eyes = eye_cascade.detectMultiScale(roi_gray)   # detect eye in ROI
        # if not eyes:          # check for eye in frame
        #     popup = tkinter.messagebox.showinfo("Alert!", "Eye not detected")     # if not found, then popup alert message
        #     root.mainloop()

        for (ex, ey ,ew, eh) in eyes:
            cv2.rectangle(roi_color, (ex,ey), (ex+ew, ey+eh), (0, 255, 0), 5)

    # Display the output
    cv2.imshow('img', img)
    if cv2.waitKey(1) & 0xFF == ord('q'):       # stop recording
        break

cam.release()