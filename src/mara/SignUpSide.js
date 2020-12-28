import React, {useState} from "react"
import axios from 'axios'
import Avatar from '@material-ui/core/Avatar';
import Button from '@material-ui/core/Button';
import CssBaseline from '@material-ui/core/CssBaseline';
import TextField from '@material-ui/core/TextField';
import Link from '@material-ui/core/Link';
import Paper from '@material-ui/core/Paper';
import Box from '@material-ui/core/Box';
import Grid from '@material-ui/core/Grid';
import LockOutlinedIcon from '@material-ui/icons/LockOutlined';
import Typography from '@material-ui/core/Typography';
import { makeStyles } from '@material-ui/core/styles';
import { useHistory } from "react-router-dom";

function Copyright() {
  return (
    <Typography variant="body2" color="textSecondary" align="center">
      {'Copyright © '}
      <Link color="inherit" href="/">
        MARA
      </Link>{' '}
      {new Date().getFullYear()}
      {'.'}
    </Typography>
  );
}

const useStyles = makeStyles((theme) => ({
  root: {
    height: '100vh',
  },
  image: {
    backgroundImage: `url(${require("../img/kebakaran.png")})`,
    backgroundRepeat: 'no-repeat',
    backgroundColor:
      theme.palette.type === 'light' ? theme.palette.grey[50] : theme.palette.grey[900],
    backgroundSize: '55%',
    backgroundPosition: '50% 50%',
  },
  paper: {
    margin: theme.spacing(15, 10),
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
  },
  avatar: {
    margin: theme.spacing(1),
    backgroundColor: theme.palette.secondary.main,
  },
  form: {
    width: '100%', // Fix IE 11 issue.
    marginTop: theme.spacing(1),
  },
  submit: {
    margin: theme.spacing(3, 0, 2),
  },
}));

export default function SignInSide() {
  const classes = useStyles();
  const [, setDaftarLogin] =  useState(null)
  const [input, setInput]  =  useState({name: "",email: "", password: ""})
  const [, setSelectedId]  =  useState(0)
  const [statusForm, setStatusForm]  =  useState("create")
  const history = useHistory();

  const handleChange = (event) =>{
    let typeOfInput = event.target.name

    switch (typeOfInput){
      case "name":
      {
        setInput({...input, name: event.target.value});
        break
      }
      case "email":
      {
        setInput({...input, email: event.target.value});
        break
      }
      case "password":
      {
        setInput({...input, password: event.target.value});
        break
      }
    default:
      {break;}
    }
  }

  const handleSubmit = (event) =>{
    event.preventDefault()

    let name = input.name
    let email = input.email
    let password = input.password
    
    if (name.replace(/\s/g,'') !== "" && email.replace(/\s/g,'') !== "" && password.replace(/\s/g,'') !== ""){
      if (statusForm === "create"){        
        axios.post(`http://localhost:8000/api/user/store`, {name: input.name, email: input.email, password: input.password})
        .then(res => {
            setDaftarLogin([
              { name: input.name,
                email : input.email,
                password: input.password
              }])
            history.push("/Home");
            alert("Account Created Successfully")
        })
      }
      setStatusForm("create")
      setSelectedId(0)
      setInput({name: "",email:"", password: ""})
    }
  }

  return (
    <Grid container component="main" className={classes.root}>
      <CssBaseline />
      <Grid item xs={false} sm={4} md={7} className={classes.image} />
      <Grid item xs={12} sm={8} md={5} component={Paper} elevation={6} square>
        <div className={classes.paper}>
          <Avatar className={classes.avatar}>
            <LockOutlinedIcon />
          </Avatar>
          <Typography component="h1" variant="h5">
            Sign up
          </Typography>
          <form className={classes.form} noValidate onSubmit={handleSubmit}>
          <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              id="name"
              label="Full Name"
              name="name"
              autoComplete="username"
              value={input.name} 
              onChange={handleChange}
              autoFocus
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              id="email"
              label="New Email Address"
              name="email"
              autoComplete="email"
              value={input.email} 
              onChange={handleChange}
              autoFocus
            />
            <TextField
              variant="outlined"
              margin="normal"
              required
              fullWidth
              name="password"
              label="New Password"
              type="password"
              id="password"
              autoComplete="current-password"
              value={input.password} 
              onChange={handleChange}
            />
            <Button
              type="submit"
              fullWidth
              variant="contained"
              color="primary"
              className={classes.submit}
            >
              Sign Up
            </Button>
            <Grid container>
              <Grid item>
                <Link href="/" variant="body2">
                  {"Already have an account? Sign in"}
                </Link>
              </Grid>
            </Grid>
            <Box mt={5}>
              <Copyright />
            </Box>
          </form>
        </div>
      </Grid>
    </Grid>
  );
}