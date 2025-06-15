const express = require('express');
const app = express();
app.use(express.json());

app.post('/verify', (req, res) => {
  const { username, password } = req.body;

  // Example static check - replace with real OAuth validation
  if (username === "admin" && password === "password123") {
    return res.json({ success: true });
  }
  res.json({ success: false });
});

app.listen(3000, () => {
  console.log("OAuth Bridge running on port 3000");
});
