import axios from 'axios'
import React, {Component} from 'react'
import {Link} from 'react-router-dom'

class Highscore extends Component {
    constructor() {
        super()
        this.state = {
            heroes: []
        }
    }

    componentDidMount() {
        axios.get('/api/v1/highscore').then(response => {
            this.setState({
                heroes: response.data.data
            })
        })
    }

    render() {
        const {heroes} = this.state
        return (
            <div className='container py-4'>
                <div className='row justify-content-center'>
                    <div className='col-md-8'>
                        <div className='card'>
                            <div className='card-header'>Highscores</div>
                            <div className='card-body'>
                                {/*<Link className='btn btn-primary btn-sm mb-3' to='/create'>*/}
                                    {/*Create new person*/}
                                {/*</Link>*/}
                                <ul className='list-group list-group-flush'>
                                    {heroes.map(hero => (
                                        <Link
                                            className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                                            to={`/heroes/${hero.id}`}
                                            key={hero.id}
                                        >
                                            {hero.person.name}
                                            <span className='badge'>
                                                Lv.{hero.level}
                                            </span>
                                        </Link>
                                    ))}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Highscore