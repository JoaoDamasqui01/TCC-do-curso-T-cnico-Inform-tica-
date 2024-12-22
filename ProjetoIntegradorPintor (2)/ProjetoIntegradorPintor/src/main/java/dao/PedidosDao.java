package dao;

import model.Pedidos;

import javax.persistence.EntityManager;
import java.util.List;

public class PedidosDao {
    private static EntityManager em;

    public PedidosDao (EntityManager em) {
        this.em = em;
    }

    public void cadastrar (Pedidos pedidos) {
        this.em.persist(pedidos);
    }
    public List<Pedidos> buscarTodos () {
        String jpql = "SELECT u FROM Pedidos u";
        return em.createQuery(jpql, Pedidos.class).getResultList();
    }
    public static Pedidos buscarPorId(int id) {
        return em.find(Pedidos.class,id);
    }
    public void excluir (Pedidos pedidos) {
        em.merge(pedidos);
        this.em.remove(pedidos);
    }
    public static void alterar(Pedidos pedidos) {
        em.merge(pedidos);
    }
}
