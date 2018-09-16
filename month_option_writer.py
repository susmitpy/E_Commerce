import pyautogui as auto


std = "<option value={}> {} </option>\n"
month_names = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]

for i in range(1, 13):
	auto.typewrite(std.format(i, month_names[i-1]))

"""
<option value=1> January </option>
<option value=2> February </option>
<option value=3> March </option>
<option value=4> April </option>
<option value=5> May </option>
<option value=6> June </option>
<option value=7> July </option>
<option value=8> August </option>
<option value=9> September </option>
<option value=10> October </option>
<option value=11> November </option>
<option value=12> December </option>


"""