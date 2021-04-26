import socket

localIP     = "127.0.0.1"
localPort   = 43278
bufferSize  = 256

# Create a datagram socket
UDPServerSocket = socket.socket(family=socket.AF_INET, type=socket.SOCK_DGRAM)

# Bind to address and ip
UDPServerSocket.bind((localIP, localPort))

# Listen for incoming datagrams
while(True):
    bytesAddressPair = UDPServerSocket.recvfrom(bufferSize)
    message = bytesAddressPair[0]
    clientMsg = "Odebrano:{}".format(message)
    print(clientMsg)