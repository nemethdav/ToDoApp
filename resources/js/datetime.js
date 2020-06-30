var currentdate = new Date();
deadline.min = new Date().toISOString().split("T")[0] + 'T' + currentdate.getHours() + ':' + currentdate.getMinutes();
