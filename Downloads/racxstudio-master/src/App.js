/* eslint-disable react/jsx-filename-extension */
/* eslint-disable react/react-in-jsx-scope */
// eslint-disable-next-line no-unused-vars
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import LandingPage from 'pages/LandingPage';
import ProjectPage from 'pages/ProjectPage';
import ProjectDetailPage from 'pages/ProjectDetailPage';
import TeamPage from 'pages/TeamPage';
import DiscussProjectPage from 'pages/DiscussProjectPage';
import NotFoundPage from 'pages/NotFoundPage';

import 'assets/css/styles.css';

function App() {
  return (
    <Switch>
      <Route exact path="/man2" component={LandingPage} />
      <Route exact path="/man2/project" component={ProjectPage} />
      <Route exact path="/man2/project/:id" component={ProjectDetailPage} />
      <Route exact path="/man2/team" component={TeamPage} />
      <Route exact path="/man2/discuss-project" component={DiscussProjectPage} />
      <Route path="" component={NotFoundPage} />
    </Switch>
  );
}

export default App;
