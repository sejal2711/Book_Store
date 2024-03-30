import tkinter as tk


def login():
    username = username_entry.get()
    password = password_entry.get()

    # Replace with your own validation logic
    if username == "your_username" and password == "your_password":
        message_label.config(text="Login Successful")
    else:
        message_label.config(text="Login Failed")


# Create a GUI window
root = tk.Tk()
root.title("Login Page")

# Username and Password Entry Widgets
username_label = tk.Label(root, text="Username:")
username_label.pack()
username_entry = tk.Entry(root)
username_entry.pack()

password_label = tk.Label(root, text="Password:")
password_label.pack()
password_entry = tk.Entry(root, show="*")
password_entry.pack()

login_button = tk.Button(root, text="Login", command=login)
login_button.pack()

message_label = tk.Label(root, text="")
message_label.pack()

root.mainloop()
