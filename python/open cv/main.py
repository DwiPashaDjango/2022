import cv2

cam = cv2.VideoCapture(0)

cv2.namedWindow("Test")

img_counter = 0

while True:
    ret, frame = cam.read()
    if not ret:
        print("Error")
        break
    cv2.imshow("Test", frame)
    k = cv2.waitKey(1)
    if k%256 == 27:
        print("Closing")
        break
    elif k%256 == 32:
        img_name = "open_frame_().png".format(img_counter)
        cv2.imwrite(img_name, frame)
        print("() written".format(img_name))
    
cam.release()

cv2.destroyAllWindows()