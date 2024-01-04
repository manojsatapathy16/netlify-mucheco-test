import { useLocation, Link } from "react-router-dom";
import './styles.css';

export default function BreadCrumbs() {
    const location = useLocation()
    let currentLink = ''
    const crumbs = location.pathname.split('/')
        .filter(crumb => crumb !== '')
        .map((crumb, index, crumbs) => {
            currentLink += `/${crumb}`

            return (
                <div className="crumb" key={crumb}>
                    <Link to={currentLink}>{`${crumb}`}</Link> {crumbs.length - 1 === index ? null : ""}
                </div>
            )
        })


    return (
        <div className="breadcrumbs">
            <div className="container">
                {!crumbs.length ? null : <Link to={'/'}>{'Home'}</Link>}
                {crumbs}
            </div>

        </div>
    )
}