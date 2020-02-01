-- Users -------------------------------------------------------

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email character varying(255) NOT NULL UNIQUE,
    password character varying(255) NOT NULL,
    last_login timestamp without time zone,
    first_name character varying(255),
    last_name character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);

-- Activations -------------------------------------------------

CREATE TABLE activations (
    id SERIAL PRIMARY KEY,
    user_id integer NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    code character varying(255) NOT NULL,
    completed boolean DEFAULT false,
    completed_at timestamp without time zone,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);

-- Persistences ------------------------------------------------

CREATE TABLE persistences (
    id SERIAL PRIMARY KEY,
    user_id integer NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    code character varying(255) NOT NULL,
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);

-- Throttle ----------------------------------------------------

CREATE TABLE throttle (
    id SERIAL PRIMARY KEY,
    user_id integer REFERENCES users(id),
    type character varying(255) NOT NULL,
    ip character varying(255),
    created_at timestamp without time zone,
    updated_at timestamp without time zone
);