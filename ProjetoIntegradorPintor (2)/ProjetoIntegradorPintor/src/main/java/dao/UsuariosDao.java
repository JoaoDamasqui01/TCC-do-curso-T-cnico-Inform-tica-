package dao;

import model.Usuarios;
import javax.persistence.EntityManager;
import java.util.List;

public class UsuariosDao {

    private static EntityManager em;

    public UsuariosDao (EntityManager em) {
        this.em = em;
    }

    public void cadastrar (Usuarios usuarios) {
        this.em.persist(usuarios);
    }
    public List<Usuarios> buscarTodos () {
        String jpql = "SELECT u FROM Usuarios u";
        return em.createQuery(jpql, Usuarios.class).getResultList();
    }
    public static Usuarios buscarPorId(int id) {
        return em.find(Usuarios.class,id);
    }
    public void excluir (Usuarios usuarios) {
        em.merge(usuarios);
        this.em.remove(usuarios);
    }
    public static void alterar(Usuarios usuarios) {
        em.merge(usuarios);
    }
}